<?php get_header(); ?>
<?php global $baseUrl; ?>
	<ul class="presentation-list">
		<?php if( have_posts() ){  while( have_posts() ){ the_post(); ?>
			<li class="group">
				<?php if( has_post_thumbnail() ){ ?>
					<figure class="thumb">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( "speaker-thumb" ); ?></a>
					</figure>
				<?php } ?>
				<div class="entry">
					<h1 class="name"><a href="<?php the_permalink(); ?>" class="c-melon-green"><?php the_title(); ?></a></h1>
					<?php if( $location = get_field('location')) { ?>
						<h2 class="country fs-12 c-green mb-15"><?php echo $location; ?></h2>
					<?php } ?>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="more-btn">+ Mais</a>
				</div>
			</li>
			<?php } ?>
		<?php } ?>
	</ul>	
<?php get_footer(); ?>