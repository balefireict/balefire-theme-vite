<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="container">

		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>
		
		<?php if ( has_post_thumbnail()) :?>
			<?php the_post_thumbnail('large', array('class' => 'img-home img-responsive')); ?>
		<?php endif; ?>
	
	</section>
	
<?php endwhile; endif; ?>	

<?php get_footer(); ?>