<?php get_header(); ?>
	<div id="content">
		<?php global $baseUrl; ?>
		<?php if( have_posts() ){  while( have_posts() ){ the_post(); ?>
			<article class="blog-article">
				<?php if (in_category( "citacao")) { ?>
				<blockquote class="quotation-post">
					<h1 class="quotation-title"><?php the_title(); ?></h1>
					<footer class="group">
						<img src="<?php echo $baseUrl; ?>/img/social-share-blog.png" height="22" width="304" alt="" class="right">
						<cite class="quotation-author"><?php echo get_field("autor_referencia"); ?></cite>
					</footer>
				</blockquote>
				<?php } else { ?>
				<header class="blog-article-header">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="blog-article-info group">
						<div class="blog-article-social">
							<img src="<?php echo $baseUrl; ?>/img/social-share-blog.png" height="22" width="304" alt="">
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
				<div class="blog-article-ft">
					<a href="<?php the_permalink(); ?>#post-comments" class="comment-link">
						<span class="comment-icon"></span>
						31 commentários
					</a>
				</div>
				<?php } ?>				
			</article>
			<?php } ?>
		<?php } ?>
		<?php /* 
		<div class="pagination-section group">
			<ul class="pagination-list group">
				<li class="left tt-upper"><a href="#">« página anterior</a></li>
				<li class="pages">
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#" class="current">3</a>
					<span>...</span>
					<a href="#">4</a>					
				</li>
				<li class="right tt-upper"><a href="#">Próxima página »</a></li>
			</ul>
		</div>
		*/ ?>
	</div>
	<?php get_sidebar("blog"); ?>
<?php get_footer(); ?>