<?php get_header(); ?>
<?php if( have_posts() ){ the_post(); ?>
	<div class="profile-column">
		<figure class="profile-picture mb-20">
			<?php if( has_post_thumbnail() ){ ?>
				<?php the_post_thumbnail( "speaker-medium" ); ?>
			<?php } ?>
			<?php global $share_icons_code; ?>
			<div class="social-networks">
				<ul class="group">
					<?php if( $networks = get_field('social_networks') ){ ?>
						<?php foreach( $networks as $network ){ ?>
							<li>
								<a href="<?php echo $network['social_networks_url']; ?>" class="icon-alone <?php if($network['social_networks_name'] == 'Share' || $network['social_networks_name'] == 'RSS') { echo 'fs-16'; } ?>">
									<span aria-hidden="true" data-icon="<?php echo $share_icons_code[ $network['social_networks_name'] ]; ?>"></span>
									<span class="screen-reader-text"><?php echo $network['social_networks_name']; ?></span>
								</a>
							</li>
						<?php } ?>
					<?php }	?>
				</ul>
			</div>
		</figure>
		<div class="headline-section twitter-widget">
			<?php global $baseUrl; ?>
			<div class="twitter-widget-hd group">
				<figure class="thumb">
					<a href="#"><img src="<?php echo $baseUrl; ?>/img/twitter-thumb.jpg" height="35" width="35" alt=""></a>
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
							<?php if($contribution['isa_contribution_url'] && $contribution['isa_contribution_url'] != "#") { ?>
								<a href="<?php echo $contribution['isa_contribution_url']; ?>">
							<?php } ?>
								<?php echo $contribution['isa_contribution_title']; ?>
							<?php if($contribution['isa_contribution_url'] && $contribution['isa_contribution_url'] != "#") { ?>
								</a>
							<?php } ?>	
						</h3>
						<p class="fs-11 ff-roboto"><?php echo $contribution['isa_contribution_detail']; ?></p>
					</div>
				<?php } ?>
			<?php }	?>
		</div>
		<?php if( $keynotes = get_field('keynotes') ){ ?>
		<section class="profile-keynotes mb-20">
			<h3 class="underlined-title icon-title"><span class="keynotes-icon icon"></span> Keynotes</h3>
				<ul class="group thumb-hrz-list">					
						<?php foreach( $keynotes as $keynote ){ ?>
							<li><a href="<?php echo $keynote['kenotes_url']; ?>">
									<?php if( $keynote_img = $keynote['keynotes_image']['sizes']['keynote-thumb']) { ?>
										<img src="<?php echo $keynote_img; ?>" height="90" width="120" alt="">
									<?php } ?>
									<strong class="title ff-roboto"><?php echo $keynote['keynotes_title']; ?></strong>
									<!-- <small class="fs-10 ff-roboto">398 views</small> -->
								</a>
							</li>
						<?php } ?>					
				</ul>
		</section>
		<?php }	?>
		<?php if( $videos = get_field('videos') ){ ?>
		<section class="profile-videos mb-20">
			<h3 class="underlined-title icon-title"><span class="videos-icon icon"></span> Videos</h3>
				<ul class="group thumb-hrz-list">
					<?php foreach( $videos as $video ){ ?>
						<li>
							<a href="<?php echo $video['videos_url']; ?>">
								<?php 
									$video_thumb = "";
									if($video['videos_provider'] == "Youtube") {
										$video_thumb = 'http://img.youtube.com/vi/' . rv_get_youtube_id( $video['videos_url'] ) . '/1.jpg';
									}
									if($video['videos_provider'] == "Vimeo") {
										$vimeo_id = rv_get_vimeo_id( $video['videos_url'] );
										$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeo_id.php"));
  										$video_thumb = $hash[0]['thumbnail_medium']; 
									}
								?>
								<img src="<?php echo $video_thumb; ?>" height="65" width="120" alt="">
								<strong class="title ff-roboto"><?php echo $video['videos_title']; ?></strong>
								<!-- <small class="fs-10 ff-roboto">1.186.006 views</small> -->
							</a>
						</li>
					<?php } ?>	
				</ul>
		</section>
		<?php }	?>
		<?php if( $books = get_field('books') ){ ?>
		<section class="profile-videos mb-20">
			<h3 class="underlined-title icon-title"><span class="books-icon icon"></span> Livros</h3>
				<ul class="group thumb-hrz-list">
					<?php foreach( $books as $book ){ ?>
					<li><a href="<?php echo $book['books_url']; ?>">
							<?php if( $book_img = $book['books_image']['sizes']['book-thumb']) { ?>
								<img src="<?php echo $book_img; ?>" height="158" width="120" alt="">
							<?php } ?>
							<strong class="title ff-roboto"><?php echo $book['books_title']; ?></strong>
						</a>
					</li>
					<?php } ?>
				</ul>
		</section>
		<?php } ?>
	</div>
<?php }	?>
<?php get_footer(); ?>