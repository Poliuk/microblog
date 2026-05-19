<?php
/**
 * Microposting theme functions.
 *
 * @package microposting
 *
 * Copyright 2026 Pablo Postigo
 *
 * Microposting is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option)
 * any later version.
 *
 * Microposting is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details: https://www.gnu.org/licenses/gpl-3.0.html
 */

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'microposting-style',
		get_parent_theme_file_uri( 'style.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	// Mobile: admin bar is 46px in-flow, scrolls away with the page.
	if ( is_admin_bar_showing() ) {
		wp_enqueue_script(
			'microposting-topbar',
			get_parent_theme_file_uri( 'assets/topbar.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}


} );

add_action( 'after_setup_theme', function () {
	add_editor_style( 'style.css' );
} );

/**
 * Register every PHP file in /patterns/ as a block pattern.
 *
 * WordPress is supposed to auto-register these via _register_theme_block_patterns(),
 * but that path is unreliable in some hosting environments — registering explicitly
 * on init guarantees the patterns are available to templates.
 */
add_action( 'init', function () {
	$dir = get_stylesheet_directory() . '/patterns/';
	foreach ( (array) glob( $dir . '*.php' ) as $file ) {
		$data = get_file_data( $file, array(
			'title'    => 'Title',
			'slug'     => 'Slug',
			'inserter' => 'Inserter',
		) );
		if ( empty( $data['slug'] ) || empty( $data['title'] ) ) {
			continue;
		}
		if ( WP_Block_Patterns_Registry::get_instance()->is_registered( $data['slug'] ) ) {
			continue;
		}
		$inserter = ! ( ! empty( $data['inserter'] ) && in_array( strtolower( $data['inserter'] ), array( 'no', 'false' ), true ) );
		ob_start();
		include $file;
		register_block_pattern( $data['slug'], array(
			'title'    => $data['title'],
			'content'  => ob_get_clean(),
			'inserter' => $inserter,
		) );
	}
} );

/**
 * Wrap pagination next/previous links with wp-element-button classes
 * so they look identical to the "See More Posts" button on single posts.
 */
function microposting_wrap_pagination_button( $block_content, $type ) {
	if ( empty( trim( $block_content ) ) ) return $block_content;
	$block_content = preg_replace(
		'/<a ([^>]*)class="([^"]*)' . preg_quote( $type, '/' ) . '([^"]*)"/',
		'<a $1class="$2' . $type . ' wp-block-button__link wp-element-button$3"',
		$block_content
	);
	return '<div class="wp-block-button pagination-btn is-style-fill">' . trim( $block_content ) . '</div>';
}

add_filter( 'render_block_core/query-pagination-next', function( $block_content ) {
	return microposting_wrap_pagination_button( $block_content, 'wp-block-query-pagination-next' );
}, 10, 1 );

add_filter( 'render_block_core/query-pagination-previous', function( $block_content ) {
	return microposting_wrap_pagination_button( $block_content, 'wp-block-query-pagination-previous' );
}, 10, 1 );

/**
 * Replace the `{search_query}` token in any block content with the current
 * search term. Used by templates/search.html's no-results heading so the
 * template can read `No results for “{search_query}”` literally — keeping
 * the placeholder visible in the editor — and the swap happens at render.
 *
 * Scoped to is_search() so the token never leaks elsewhere.
 */
add_filter( 'render_block', function ( $block_content, $block ) {
	if ( ! is_search() || strpos( $block_content, '{search_query}' ) === false ) {
		return $block_content;
	}
	$term = trim( (string) get_search_query( false ) );
	return str_replace( '{search_query}', esc_html( $term ), $block_content );
}, 10, 2 );

/**
 * Hide the "See More Posts" buttons block on the search template when the
 * current search yielded no results. The template marks the block with the
 * `search-see-more-posts` className; this filter checks the main query on
 * search pages and returns an empty string when there are zero posts so the
 * button only appears alongside actual results.
 */
add_filter( 'render_block_core/buttons', function ( $block_content, $block ) {
	$class_name = $block['attrs']['className'] ?? '';
	if ( strpos( $class_name, 'search-see-more-posts' ) === false ) {
		return $block_content;
	}
	if ( is_search() ) {
		global $wp_query;
		if ( empty( $wp_query->posts ) ) {
			return '';
		}
	}
	return $block_content;
}, 10, 2 );

/**
 * Customise the <!--more--> teaser link in feed views.
 * Replaces the default "(more…)" span with a translatable "Read More →" label
 * and removes the `#more-N` fragment so the link points to the post itself —
 * styling then comes from the .wp-block-post-content a rules in style.css,
 * identical to any inline link.
 */
add_filter( 'the_content_more_link', function( $link, $more_link_text ) {
	$href  = get_permalink();
	$title = get_the_title();
	return sprintf(
		'<a href="%1$s" class="more-link" aria-label="%2$s">%3$s</a>',
		esc_url( $href ),
		esc_attr( sprintf( /* translators: %s: post title */ __( 'Continue reading %s', 'microposting' ), $title ) ),
		esc_html__( 'Read More →', 'microposting' )
	);
}, 10, 2 );
