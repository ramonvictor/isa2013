<?php get_header(); ?>
<?php if( have_posts() ){ the_post(); ?>
	<div class="profile-column">
		<figure class="profile-picture mb-20">
			<?php if( has_post_thumbnail() ){ ?>
				<?php the_post_thumbnail( "speaker-medium" ); ?>
			<?php } ?>
			<div class="social-networks">
				<ul class="group">
					<li>
						<a href="#" class="icon-alone fs-16">
							<span aria-hidden="true" data-icon="&#x73;"></span>
							<span class="screen-reader-text">Share</span>
						</a>
					</li>
					<li>
						<a href="#" class="icon-alone">
							<span aria-hidden="true" data-icon="&#x66;"></span>
							<span class="screen-reader-text">Facebook</span>
						</a>
					</li>
					<li>		
						<a href="#" class="icon-alone">
							<span aria-hidden="true" data-icon="&#x74;"></span>
							<span class="screen-reader-text">Twitter</span>
						</a>	
					</li>				
					<li>
						<a href="#" class="icon-alone">
							<span aria-hidden="true" data-icon="&#x6c;"></span>
							<span class="screen-reader-text">LinkedIn</span>
						</a>
					</li>
					<li>
						<a href="#" class="icon-alone">
							<span aria-hidden="true" data-icon="&#x67;"></span>
							<span class="screen-reader-text">Google Plus</span>
						</a>
					</li>
					<li>
						<a href="#" class="icon-alone fs-16">
							<span aria-hidden="true" data-icon="&#x72;"></span>
							<span class="screen-reader-text">Rss</span>
						</a>
					</li>
				</ul>
			</div>
		</figure>
		<div class="headline-section twitter-widget">
			<div class="twitter-widget-hd group">
				<figure class="thumb">
					<a href="#"><img src="img/twitter-thumb.jpg" height="35" width="35" alt=""></a>
				</figure>
				<a href="#" class="twitter-name fw-bold fs-16">@arnevanoosterom</a>
			</div>
			<div class="twitter-widget-body">
				<p>Aberta a chamada para Artigos Acadêmicos no @ISAmerica13 <a href="#">isa.ixda.org/2013/artigos</a> submissão dos artigos até 15 de junho!</p>
			</div>
		</div>
	</div>
	<div class="profile-detail-column">
		<header class="profile-detail-hd">
			<h1 class="profile-name"><?php the_title(); ?></h1>
			<?php if( $location = get_field('location')) { ?>
				<h2 class="profile-country"><?php echo $location; ?></h2>
			<?php } ?>
		</header>
		<div class="profile-entry mb-20">
			<?php the_content(); ?>
		</div>
		<div class="profile-events group mb-20">
			<?php if( $contributions = get_field('isa_contribution') ){ ?>
				<?php $c = 0; ?>
				<?php foreach( $contributions as $contribution ){ ?>
					<?php $c++; ?>		
				<div class="profile-event <?php if($c%2==0) { echo 'right'; } else { echo 'left'; } ?>">
					<strong class="label"><?php echo $contribution['isa_contribution_label']; ?></strong>
					<h3 class="profile-event-title">
						<a href="<?php echo $contribution['isa_contribution_url']; ?>">
							<?php echo $contribution['isa_contribution_title']; ?>
						</a>
					</h3>
					<p class="fs-11 ff-roboto"><?php echo $contribution['isa_contribution_detail']; ?></p>
				</div>
			<?php } ?>
			<?php }	?>
			<!-- <div class="profile-event right">
				<strong class="label">Palestra</strong>
				<h3 class="profile-event-title">Innovation Process with Interaction</h3>
				<p class="fs-11 ff-roboto">16/11 - 14h Teatro Guararapes (Inglês » Portuges)</p>
			</div> -->
		</div>
		<section class="profile-keynotes mb-20">
			<h3 class="underlined-title icon-title"><span class="keynotes-icon icon"></span> Keynotes</h3>
				<ul class="group thumb-hrz-list">
					<li><a href="#">
							<img src="img/profile/keynote-thumb.jpg" height="90" width="120" alt="">
							<strong class="title ff-roboto">Data design Drivem for small business</strong>
							<small class="fs-10 ff-roboto">398 views</small>
						</a>
					</li>
					<li><a href="#">
							<img src="img/profile/keynote-thumb.jpg" height="90" width="120" alt="">
							<strong class="title ff-roboto">Data design Drivem for small business</strong>
							<small class="fs-10 ff-roboto">398 views</small>
						</a>
					</li>
					<li><a href="#">
							<img src="img/profile/keynote-thumb.jpg" height="90" width="120" alt="">
							<strong class="title ff-roboto">Data design Drivem for small business</strong>
							<small class="fs-10 ff-roboto">398 views</small>
						</a>
					</li>
					<li><a href="#">
							<img src="img/profile/keynote-thumb.jpg" height="90" width="120" alt="">
							<strong class="title ff-roboto">Data design Drivem for small business</strong>
							<small class="fs-10 ff-roboto">398 views</small>
						</a>
					</li>
				</ul>
		</section>
		<section class="profile-videos mb-20">
			<h3 class="underlined-title icon-title"><span class="videos-icon icon"></span> Videos</h3>
				<?php
				// $imgid = 6271487;
				// $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
				// echo $hash[0]['thumbnail_medium'];  
				?>
				<ul class="group thumb-hrz-list">
					<li><a href="#">
							<img src="img/profile/video-thumb.jpg" height="65" width="120" alt="">
							<strong class="title ff-roboto">Design the new Business</strong>
							<small class="fs-10 ff-roboto">1.186.006 views</small>
						</a>
					</li>
					<li><a href="#">
							<img src="img/profile/video-thumb.jpg" height="65" width="120" alt="">
							<strong class="title ff-roboto">Design the new Business</strong>
							<small class="fs-10 ff-roboto">1.186.006 views</small>
						</a>
					</li>
					<li><a href="#">
							<img src="img/profile/video-thumb.jpg" height="65" width="120" alt="">
							<strong class="title ff-roboto">Design the new Business</strong>
							<small class="fs-10 ff-roboto">1.186.006 views</small>
						</a>
					</li>
				</ul>
		</section>
		<section class="profile-videos mb-20">
			<h3 class="underlined-title icon-title"><span class="books-icon icon"></span> Livros</h3>
				<ul class="group thumb-hrz-list">
					<li><a href="#">
							<img src="img/profile/book-thumb.jpg" height="158" width="120" alt="">
							<strong class="title ff-roboto">This is Service Design Thinking</strong>
						</a>
					</li>
					<li><a href="#">
							<img src="img/profile/book-thumb.jpg" height="158" width="120" alt="">
							<strong class="title ff-roboto">This is Service Design Thinking</strong>
						</a>
					</li>
				</ul>
		</section>
	</div>
<?php }	?>
<?php get_footer(); ?>