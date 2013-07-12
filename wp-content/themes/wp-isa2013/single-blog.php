	<?php get_header(); ?>
	<div id="content">
		<?php if( have_posts() ){  the_post(); ?>
			<article class="blog-article">
				<header class="blog-article-header">
					<h1 class="c-orange"><?php the_title(); ?></h1>
					<div class="blog-article-info group">
						<div class="blog-article-social">
							<ul>
								<li>
									<span class="share-facebook-icon left"></span>
									<div class="share-bubble facebook-bubble" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>"></div>
								</li>
								<li>
									<span class="share-twitter-icon left"></span>
									<div class="share-bubble twitter-bubble" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>"></div>
								</li>
								<li>
									<span class="share-gplus-icon left"></span>
									<div class="share-bubble gplus-bubble" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>"></div>
								</li>	
								<li>
									<span class="share-linkedin-icon left"></span>
									<div class="share-bubble linkedin-bubble" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>"></div>
								</li>						
							</ul>
						</div>
						<div class="blog-article-time">
							<time><?php echo get_the_time("d/m") ?></time>	
						</div>
						<div class="blog-article-author">
							<?php $email_hash = md5( trim(get_field("autor_email")) ); ?>
							<img src="http://www.gravatar.com/avatar/<?php echo $email_hash; ?>?s=35" height="35" width="35" alt="<?php echo get_field("autor_nome"); ?>" class="thumb circle-img">
							<span>por <strong><?php echo get_field("autor_nome"); ?></strong></span>
						</div>						
					</div>
				</header>
				<div class="blog-article-entry">
					<?php the_content(); ?>
				</div>
			</article>
			<div class="see-also-blog group">
				<p class="see-also-title">Leia também</p>
				<?php 
					$rv_query = new WP_Query();
					$args = array( 
								'category_name' => 'blog', 
								'category__not_in' => 3, // citacao
								'posts_per_page' => 2,
								'post__not_in' => array($post->ID),
								'suppress_filters' => FALSE 
							);
					$rv_query->query($args);
					if( $rv_query->have_posts() ){
						$c = 0;
						while( $rv_query->have_posts() ){ 
							$rv_query->the_post(); $c++;								
				?>
						<?php $className = $c%2==0 ? "right" : "left"; ?>
						<article class="column <?php echo $className; ?>">
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<p class="author ff-roboto">Por <?php echo get_field("autor_nome") ?></p>
						</article>
						<?php } ?>
					<?php } ?>
			</div>
			<div id="post-comments" class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="638" data-num-posts="10"></div>
		<?php } ?>
	</div>
	<?php get_sidebar("blog"); ?>
<?php get_footer(); ?>	