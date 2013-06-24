<?php get_header(); ?>
<?php if( have_posts() ){ the_post(); ?>
	<div id="content">
		<h1 class="content-title c-green"><?php the_title(); ?></h1>
		<div class="content-entry ff-roboto">
			<?php the_content(); ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php }	?>	
<?php get_footer(); ?>