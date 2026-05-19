<?php
/**
 * Title: Search pagination (Previous/Next Results)
 * Slug: microposting/search-pagination
 * Inserter: no
 */
?>
<!-- wp:query-pagination {"paginationArrow":"none","layout":{"type":"flex","justifyContent":"space-between"}} -->
<div class="wp-block-query-pagination is-layout-flex">
	<!-- wp:query-pagination-previous {"label":<?php echo wp_json_encode( __( 'See Previous Results', 'microposting' ) ); ?>} /-->
	<!-- wp:query-pagination-next {"label":<?php echo wp_json_encode( __( 'See Next Results', 'microposting' ) ); ?>} /-->
</div>
<!-- /wp:query-pagination -->
