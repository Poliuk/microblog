<?php
/**
 * Title: Feed pagination (Previous/Next Posts)
 * Slug: microposting/index-pagination
 * Inserter: no
 */
?>
<!-- wp:query-pagination {"paginationArrow":"none","layout":{"type":"flex","justifyContent":"space-between"}} -->
<div class="wp-block-query-pagination is-layout-flex">
	<!-- wp:query-pagination-previous {"label":<?php echo wp_json_encode( __( 'See Previous Posts', 'microposting' ) ); ?>} /-->
	<!-- wp:query-pagination-next {"label":<?php echo wp_json_encode( __( 'See Next Posts', 'microposting' ) ); ?>} /-->
</div>
<!-- /wp:query-pagination -->
