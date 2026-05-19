<?php
/**
 * Title: Single post nav (back arrow + "Post" label)
 * Slug: microposting/single-post-nav
 * Inserter: no
 */
?>
<!-- wp:group {"className":"single-nav","style":{"spacing":{"padding":{"top":"6px","right":"16px","bottom":"6px","left":"8px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"left"}} -->
<div class="wp-block-group single-nav" style="padding-top:6px;padding-right:16px;padding-bottom:6px;padding-left:8px;margin-top:0;margin-bottom:0">

	<!-- wp:html --><a class="single-back-arrow" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr__( 'Back to posts', 'microposting' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 5-7 7 7 7"/></svg></a><!-- /wp:html -->

	<!-- wp:paragraph {"className":"single-post-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontSize":"1.1rem","fontWeight":"700"}}} -->
	<p class="single-post-label" style="margin-top:0;margin-bottom:0;font-size:1.1rem;font-weight:700"><?php echo esc_html__( 'Post', 'microposting' ); ?></p>
	<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
