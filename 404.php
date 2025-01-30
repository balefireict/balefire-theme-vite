<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Balefire
 */

get_header(); ?>

<div class="content">
	<div class="inner-content">
		<main class="main" role="main">
			<article class="content-not-found">
				<header class="article-header">
					<h1><?php _e('404 - Page Not Found', 'balefire'); ?></h1>
				</header>

				<section class="entry-content">
					<p><?php _e('The page you were looking for was not found. Please try one of the following:', 'balefire'); ?></p>
					<ul>
						<li><?php _e('Check your spelling', 'balefire'); ?></li>
						<li><?php _e('Return to the', 'balefire'); ?> <a href="<?php echo home_url(); ?>"><?php _e('home page', 'balefire'); ?></a></li>
						<li><?php _e('Click the', 'balefire'); ?> <a href="javascript:history.back()"><?php _e('back button', 'balefire'); ?></a></li>
					</ul>
				</section>

				<section class="search">
					<p><?php _e('You can also try searching:', 'balefire'); ?></p>
					<?php get_search_form(); ?>
				</section>
			</article>
		</main>
	</div>
</div>

<?php get_footer(); ?>