<?php get_header(); ?>
	<?php global $baseUrl; ?>
	<?php 
		$rv_query = new WP_Query();
		$args = array( 'page_id' => 35, 'suppress_filters' => FALSE ); // Workshops
		$rv_query->query($args);
		if( $rv_query->have_posts() ){
			$rv_query->the_post(); ?>
		<div class="mb-30">
			<h1 class="content-title c-green"><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
		</div>
	<?php }	?>	
	<ul class="presentation-list">
		<?php if( have_posts() ){  while( have_posts() ){ the_post(); ?>
			<li class="group">
				<?php 
					$inscricao_url = get_field('register_link');
				?>
				<?php if( has_post_thumbnail() ){ ?>
					<figure class="thumb">
						<a href="<?php echo $inscricao_url; ?>"><?php the_post_thumbnail( "speaker-thumb" ); ?></a>
					</figure>
				<?php } ?>
				<div class="entry content-entry">
					<h1 class="name"><a href="<?php echo $inscricao_url; ?>" class="c-melon-green"><?php the_title(); ?></a></h1>
					<p><?php the_content(); ?></p>
					<?php if( $inscricao_url == "#"){ ?>
						<p>
							<strong class="c-orange">
								<?php if(ICL_LANGUAGE_CODE == "en"){ ?>
								Registration will be opened 12 August at 2pm (Brasília, GMT-03:00)
								<?php } else { ?>
								Inscrições serāo abertas no dia 12/08
								<?php } ?>								
							</strong>
						</p>
					<?php } else { ?>
						<a href="<?php echo $inscricao_url; ?>" class="more-btn">
							<?php if(ICL_LANGUAGE_CODE == "en"){ ?>
							Register
							<?php } else { ?>
							Inscrever-se
							<?php } ?>
						</a>
					<?php } ?>
				</div>
			</li>
			<?php } ?>
		<?php } ?>
	</ul>	
<?php get_footer(); ?>