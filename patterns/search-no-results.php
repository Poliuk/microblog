<?php
/**
 * Title: Search — no results message
 * Slug: microposting/search-no-results
 * Inserter: no
 */
?>
<!-- wp:group {"className":"search-no-results","style":{"spacing":{"padding":{"top":"64px","right":"24px","bottom":"64px","left":"24px"},"blockGap":"8px"}},"layout":{"type":"constrained","contentSize":"420px"}} -->
<div class="wp-block-group search-no-results" style="padding-top:64px;padding-right:24px;padding-bottom:64px;padding-left:24px">
	<!-- wp:heading {"level":2,"className":"search-no-results__title"} -->
	<h2 class="wp-block-heading search-no-results__title"><?php
		/* translators: %s: HTML span containing the user's search query */
		printf(
			esc_html__( 'No results for %s', 'microposting' ),
			'“<span class="search-no-results__term">{search_query}</span>”'
		);
	?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"search-no-results__text"} -->
	<p class="search-no-results__text"><?php echo esc_html__( 'Try searching for something else.', 'microposting' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
