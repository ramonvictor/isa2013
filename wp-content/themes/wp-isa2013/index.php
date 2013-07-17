<?php get_header(); ?>
	<?php global $baseUrl; ?>
	<section class="speakers-section group">
		<h1 class="title fw-light c-green">
			<?php if(ICL_LANGUAGE_CODE == "en"){ ?>
			14 speakers
			<?php } else { ?>
			14 palestrantes confirmados
			<?php } ?>
		</h1>
		<ul class="speakers-list">
			<?php 
				$rv_query = new WP_Query();
				$args = array( "post_type" => "palestras");
				$rv_query->query($args);
				
				$c = 0;
				if( $rv_query->have_posts() ){
					while( $rv_query->have_posts() ){	
						$rv_query->the_post(); 
						$c++;
			?>
						<li <?php if($c%5==0) { echo 'class="no-mr"'; } ?>>
							<a href="<?php the_permalink(); ?>" class="speaker-box">
								<?php if( has_post_thumbnail() ){ ?>
									<?php the_post_thumbnail( "speaker-thumb" ); ?>
								<?php } ?>
								<strong class="name fs-16"><?php the_title(); ?></strong>
								<?php if( $location = get_field('location')) { ?>
									<span class="country fs-12"><?php echo $location; ?></span>
								<?php } ?>
							</a>
						</li>
				<?php } ?>
			<?php }	?>	
		</ul>	
	</section>
	<section class="highlights-section group">
		<div class="highlight-section green-box">
			<?php 
				$rv_query = new WP_Query();
				$args = array( 'page_id' => 35, 'suppress_filters' => FALSE ); // Workshops
				$rv_query->query($args);
				if( $rv_query->have_posts() ){
					$rv_query->the_post();
			?>
				<h1 class="fs-30 title"><?php the_title(); ?></h1>
				<p><?php echo Geral::my_excerpt($post->post_content, 19, " ...") ?></p>
				<a href="<?php the_permalink(); ?>" class="highlight-section-btn fs-15">
					&raquo; <?php _e('Inscreva-se', 'wp-isa2013');  ?>
				</a>
			<?php }	?>	
		</div>
		<div class="highlight-section light-red-box">
			<?php 
				$rv_query = new WP_Query();
				$args = array( 'page_id' => 13, 'suppress_filters' => FALSE ); // Artigos Acadêmicos
				$rv_query->query($args);
				if( $rv_query->have_posts() ){
					$rv_query->the_post();
			?>
				<h1 class="fs-30 title"><?php the_title(); ?></h1>
				<p><?php echo Geral::my_excerpt($post->post_content, 19, " ...") ?></p>
				<a href="<?php the_permalink(); ?>" class="highlight-section-btn fs-15">&raquo; <?php _e('Submeta seu artigo', 'wp-isa2013');  ?></a>
			<?php }	?>
		</div>
		<div class="highlight-section melon-green-box">
			<?php 
				$rv_query = new WP_Query();
				$args = array( 'page_id' => 39, 'suppress_filters' => FALSE ); // Casos de mercado
				$rv_query->query($args);
				if( $rv_query->have_posts() ){
					$rv_query->the_post();
			?>
			<h1 class="fs-30 title"><?php the_title(); ?></h1>
			<p><?php echo Geral::my_excerpt($post->post_content, 19, " ...") ?></p>
			<a href="<?php the_permalink(); ?>" class="highlight-section-btn fs-15">&raquo; <?php _e('Acompanhe', 'wp-isa2013');  ?></a>
			<?php }	?>	
		</div>
	</section>
	<section class="headlines-section mb-30 group">
		<?php $tweets = rv_get_tweets("ISAmerica13", 1); ?>
		<?php if ($tweets) { ?>
		<div class="headline-section twitter-widget">
			<?php foreach ($tweets as $tweet) { ?>
			<div class="twitter-widget-hd group">
				<figure class="thumb">
					<a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>">
						<img src="<?php echo $tweet->user->profile_image_url; ?>" height="35" width="35" alt="">
					</a>
				</figure>
				<a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>" class="twitter-name fw-bold fs-16">@<?php echo $tweet->user->screen_name; ?></a>
			</div>
			<div class="twitter-widget-body">
				<p><?php echo $tweet->text; ?></p>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php 
				$rv_query = new WP_Query();
				$args = array( 
							'category_name' => 'blog', 
							'category__not_in' => 3, // citacao
							'posts_per_page' => 2,
							'suppress_filters' => FALSE 
						);
				$rv_query->query($args);
				if( $rv_query->have_posts() ){
					while( $rv_query->have_posts() ){ 
							$rv_query->the_post();
			?>
			<div class="headline-section headline-blog">
				<article class="blog-headline">
					<div class="label c-gray fs-12">Blog ISA13</div>
					<h1 class="title"><a href="<?php the_permalink(); ?>" class="c-orange"><?php the_title(); ?></a></h1>
					<p class="author c-gray fs-12">Por <?php echo get_field("autor_nome") ?></p>
				</article>			
			</div>
				<?php }	?>
			<?php }	?>	
	</section>
<?php get_footer(); ?>