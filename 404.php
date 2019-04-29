<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kbbmk
 */

get_header(); ?>
<style>
.sub-navigation {
	display: none;
}
</style>
<div class="main-container" id="page-404">

    <div class="main wrapper clearfix">

			<section class="error-404- not-found">
				<header class="page-header">
					<h1 class="page-title">404 page can&rsquo;t be found.</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>It looks like nothing was found at this location.</p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

	</div><!-- #primary -->
</div>
<?php
get_footer();
