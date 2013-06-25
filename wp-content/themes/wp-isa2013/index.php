<?php get_header(); ?>
<?php global $baseUrl; ?>
	<section class="speakers-section group">
		<h1 class="title fw-light c-green">14 <?php _e('[:pt]palestrantes confirmados[:en]confirmed speakers[:es]ponentes confirmados'); ?></h1>
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
			<h1 class="fs-30 title">Workshops</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elited vitae ante encras elementum congue lectsuscipit donec eros ligula, mattis quis consec facilisis sed torted id massa elit nullam.</p>
			<a href="#" class="highlight-section-btn fs-15">&raquo; Inscreva-se</a>
		</div>
		<div class="highlight-section light-red-box">
			<h1 class="fs-30 title">Artigos cientificos</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elited vitae ante encras elementum congue lectsuscipit donec eros ligula, mattis quis consec facilisis sed torted id massa elit nullam.</p>
			<a href="#" class="highlight-section-btn fs-15">&raquo; Submeta seu artigo</a>
		</div>
		<div class="highlight-section melon-green-box">
			<h1 class="fs-30 title">Cases de mercado</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elited vitae ante encras elementum congue lectsuscipit donec eros ligula, mattis quis consec facilisis sed torted id massa elit nullam.</p>
			<a href="#" class="highlight-section-btn fs-15">&raquo; Submeta seu case</a>
		</div>
	</section>
	<section class="headlines-section mb-30 group">
		<div class="headline-section twitter-widget">
			<div class="twitter-widget-hd group">
				<figure class="thumb">
					<a href="#"><img src="<?php echo $baseUrl; ?>/img/twitter-thumb.jpg" height="35" width="35" alt=""></a>
				</figure>
				<a href="#" class="twitter-name fw-bold fs-16">@isaamerica13</a>
			</div>
			<div class="twitter-widget-body">
				<p>Aberta a chamada para Artigos Acadêmicos no @ISAmerica13 <a href="#">isa.ixda.org/2013/artigos</a> submissão dos artigos até 15 de junho!</p>
			</div>
		</div>
		<div class="headline-section headline-blog">
			<article class="blog-headline">
				<div class="label c-gray fs-12">Blog ISA13</div>
				<h1 class="title"><a href="#" class="c-orange">Quando a o Design de Interação pode ser o caminho para aumentar o ROI do seu negócio?</a></h1>
				<p class="author c-gray fs-12">Por Emiliano Abad</p>
			</article>			
		</div>
		<div class="headline-section headline-blog">
			<article class="blog-headline">
				<div class="label c-gray fs-12">Blog ISA13</div>
				<h1 class="title"><a href="#" class="c-orange">Design Thinking aprendendo na prática.</a></h1>
				<p class="author c-gray fs-12">Por Emiliano Abad</p>
			</article>			
		</div>
	</section>
<?php get_footer(); ?>