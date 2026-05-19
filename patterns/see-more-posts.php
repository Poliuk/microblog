<?php
/**
 * Title: "See More Posts" button
 * Slug: microposting/see-more-posts
 * Inserter: no
 */
?>
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-layout-flex">
	<!-- wp:button {"width":80,"className":"is-style-fill","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<div class="wp-block-button has-custom-width wp-block-button__width-80 is-style-fill"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="font-style:normal;font-weight:400"><?php echo esc_html__( 'See More Posts', 'microposting' ); ?></a></div>
	<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
