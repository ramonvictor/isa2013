<?php get_header(); ?>
<?php global $baseUrl; ?>
<?php if( have_posts() ){ the_post(); ?>
	<div id="content">
		<h1 class="content-title c-green"><?php the_title(); ?></h1>
		<?php if($content_slider = get_field('content_slider')){ ?>
			<div class="slider-wrapper mb-15">
				<?php foreach( $content_slider as $slide ){ ?>				
				<figure class="item content-image">
					<?php $image_src = $slide["content_slider_image"]["sizes"]["medium"]; ?>
					<img src="<?php echo $image_src; ?>" height="350" width="630" alt="">
					<figcaption class="caption">
						<?php echo $slide['content_slider_caption']; ?>
					</figcaption>
				</figure>
				<?php } ?>
			</div>
			<div id="slider-pager" class="slider-nav mb-20"></div>
		<?php } ?>
		<div class="content-entry ff-roboto">
			<?php the_content(); ?>
		</div>
	</div>
	<?php if($is_default_sidebar = get_field('default_sidebar')){ ?>
		<?php get_sidebar(); ?>
	<?php } else { ?>
		<div id="sidebar">
			<?php if( $headlines = get_field('headlines') ){ ?>
				<?php foreach( $headlines as $headline ){ ?>
					<section class="mb-20">
						<h2 class="sidebar-main-title"><?php echo $headline['headline_title']; ?></h2>
						<div class="article-sidebar-text">
							<?php echo $headline['headline_content']; ?>
						</div>
					</section>
				<?php } ?>
			<?php }	?>			
		</div>
	<?php } ?>
<?php } ?>
<?php get_footer(); ?>