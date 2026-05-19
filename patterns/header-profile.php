<?php
/**
 * Title: Header profile bio
 * Slug: microposting/header-profile
 * Inserter: no
 */
?>
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem"},"spacing":{"margin":{"top":"8px","bottom":"var(--wp--preset--spacing--10)"}}}} -->
<p style="font-size:0.85rem;margin-top:8px;margin-bottom:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'A short bio about the person behind this microblog.', 'microposting' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"header-meta","layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal","justifyContent":"left"},"style":{"spacing":{"blockGap":"var(--wp--preset--spacing--10)"}}} -->
<div class="wp-block-group header-meta">

	<!-- wp:group {"className":"header-meta-item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group header-meta-item is-nowrap is-layout-flex">
		<!-- wp:html --><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="header-icon" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg><!-- /wp:html -->
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--small)","lineHeight":"1.2"}},"textColor":"custom-text-light"} -->
		<p class="has-custom-text-light-color has-text-color" style="font-size:var(--wp--preset--font-size--small);line-height:1.2"><?php echo esc_html__( 'Your City', 'microposting' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"header-meta-item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group header-meta-item is-nowrap is-layout-flex">
		<!-- wp:html --><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="header-icon" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><!-- /wp:html -->
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--small)","lineHeight":"1.2"}},"textColor":"custom-text-light"} -->
		<p class="has-custom-text-light-color has-text-color" style="font-size:var(--wp--preset--font-size--small);line-height:1.2"><?php echo esc_html__( 'Joined Year', 'microposting' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"header-meta-item","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group header-meta-item is-nowrap is-layout-flex">
		<!-- wp:html --><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="header-icon" aria-hidden="true"><path d="M4 11a9 9 0 0 1 9 9"/><path d="M4 4a16 16 0 0 1 16 16"/><circle cx="5" cy="19" r="1"/></svg><!-- /wp:html -->
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var(--wp--preset--font-size--small)","lineHeight":"1.2"}},"textColor":"custom-text-light"} -->
		<p class="has-custom-text-light-color has-text-color" style="font-size:var(--wp--preset--font-size--small);line-height:1.2"><a href="<?php echo esc_url( get_feed_link() ); ?>"><?php echo esc_html__( 'RSS', 'microposting' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
