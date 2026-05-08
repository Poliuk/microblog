<?php
/**
 * Microblog theme functions.
 *
 * @package microblog
 */

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'microblog-style',
		get_parent_theme_file_uri( 'style.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	// Mobile: admin bar is 46px in-flow, scrolls away with the page.
	if ( is_admin_bar_showing() ) {
		wp_enqueue_script(
			'microblog-topbar',
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

add_filter( 'pre_option_avatar_default', fn() => 'mystery' );

/**
 * Wrap pagination next/previous links with wp-element-button classes
 * so they look identical to the "See More Posts" button on single posts.
 */
function microblog_wrap_pagination_button( $block_content, $type ) {
	if ( empty( trim( $block_content ) ) ) return $block_content;
	$block_content = preg_replace(
		'/<a ([^>]*)class="([^"]*)' . preg_quote( $type, '/' ) . '([^"]*)"/',
		'<a $1class="$2' . $type . ' wp-block-button__link wp-element-button$3"',
		$block_content
	);
	return '<div class="wp-block-button pagination-btn is-style-fill">' . trim( $block_content ) . '</div>';
}

add_filter( 'render_block_core/query-pagination-next', function( $block_content ) {
	return microblog_wrap_pagination_button( $block_content, 'wp-block-query-pagination-next' );
}, 10, 1 );

add_filter( 'render_block_core/query-pagination-previous', function( $block_content ) {
	return microblog_wrap_pagination_button( $block_content, 'wp-block-query-pagination-previous' );
}, 10, 1 );

/**
 * Replace core/avatar block output with the Site Icon image.
 * Falls back to mystery-man Gravatar if no Site Icon is set.
 * Link logic:
 *   - size >= 80 or linkTarget="_self" → homepage
 *   - size 40 in feed (no _self target) → author archive
 */
add_filter( 'render_block_core/avatar', function( $block_content, $block ) {
	$size         = intval( $block['attrs']['size'] ?? 40 );
	$site_icon_id = (int) get_option( 'site_icon' );

	if ( $site_icon_id ) {
		$src = wp_get_attachment_image_url( $site_icon_id, 'full' );
		$img = '<img src="' . esc_url( $src ) . '" alt="" width="' . $size . '" height="' . $size . '" class="avatar avatar-' . $size . '" style="border-radius:100px;object-fit:cover;display:block;" />';
	} else {
		$post_id   = absint( $block['attrs']['postId'] ?? get_the_ID() );
		$author_id = $post_id ? (int) get_post_field( 'post_author', $post_id ) : get_current_user_id();
		$email     = get_the_author_meta( 'user_email', $author_id );
		$img       = get_avatar( $email ?: $author_id, $size, 'mp', '', [ 'class' => 'avatar avatar-' . $size ] );
	}

	if ( ! $img ) {
		return '<div class="wp-block-avatar" style="width:' . $size . 'px;height:' . $size . 'px;"></div>';
	}

	$is_link     = ! empty( $block['attrs']['isLink'] );
	$link_target = $block['attrs']['linkTarget'] ?? '';

	if ( $is_link ) {
		$post_id   = absint( $block['attrs']['postId'] ?? get_the_ID() );
		$author_id = $post_id ? (int) get_post_field( 'post_author', $post_id ) : get_current_user_id();
		$href      = ( $size >= 80 || $link_target === '_self' )
			? esc_url( home_url( '/' ) )
			: esc_url( get_author_posts_url( $author_id ) );
		$img = '<a href="' . $href . '">' . $img . '</a>';
	}

	return '<div class="wp-block-avatar">' . $img . '</div>';
}, 10, 2 );

/**
 * Replace core/site-logo block output with the Site Icon image.
 * Site Icon is the canonical “site avatar” in WordPress — it powers the
 * favicon, app icons, and admin bar avatar — so this theme uses it everywhere
 * a circular site image is shown. Falls back to the regular Site Logo if no
 * Site Icon is set, then to nothing.
 */
add_filter( 'render_block_core/site-logo', function( $block_content, $block ) {
	$site_icon_id = (int) get_option( 'site_icon' );
	if ( ! $site_icon_id ) {
		return $block_content;
	}

	$width   = intval( $block['attrs']['width'] ?? 0 );
	$is_link = ! isset( $block['attrs']['isLink'] ) || ! empty( $block['attrs']['isLink'] );
	$src     = wp_get_attachment_image_url( $site_icon_id, 'full' );
	if ( ! $src ) {
		return $block_content;
	}

	$size_attrs = $width
		? ' width="' . $width . '" height="' . $width . '" style="width:' . $width . 'px;height:' . $width . 'px;object-fit:cover;"'
		: ' style="object-fit:cover;"';

	$class_attr = isset( $block['attrs']['className'] ) ? ' ' . esc_attr( $block['attrs']['className'] ) : '';
	$img        = '<img src="' . esc_url( $src ) . '" alt="" class="custom-logo"' . $size_attrs . ' />';

	if ( $is_link ) {
		$img = '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link" rel="home">' . $img . '</a>';
	}

	return '<div class="wp-block-site-logo' . $class_attr . '">' . $img . '</div>';
}, 10, 2 );

/**
 * Customise the <!--more--> teaser link in feed views.
 * Replaces the default “(more…)” span with “Read More →” and removes the
 * `#more-N` fragment so the link points to the post itself — styling then
 * comes from the .wp-block-post-content a rules in style.css, identical to
 * any inline link.
 */
add_filter( 'the_content_more_link', function( $link, $more_link_text ) {
	$href = get_permalink();
	$title = get_the_title();
	return sprintf(
		'<a href="%1$s" class="more-link" aria-label="%2$s">Read More →</a>',
		esc_url( $href ),
		esc_attr( sprintf( 'Continue reading %s', $title ) )
	);
}, 10, 2 );
