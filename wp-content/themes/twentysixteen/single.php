<?php get_header(); ?>
<h1>dans single.php, Article</h1>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php the_title(); ?>
		<?php the_content(); ?>
	<?php endwhile;?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>