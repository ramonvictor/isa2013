<?php get_header(); ?>
<?php if( have_posts() ){ the_post(); ?>
	<div id="content">
		<h1 class="content-title c-green"><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php if( $team = get_field('team') ){ ?>
		<ul class="team-list">
			<?php $c = 0; ?>
			<?php foreach( $team as $member ){ ?>
				<?php $c++; ?>
					<li <?php if($c%3==0) { echo 'class="no-mr"'; } ?>>
						<div class="member-box">
							<?php if( $photo = $member['image']['sizes']['speaker-thumb'] ){ ?>
								<figure class="profile-picture">
									<img src="<?php echo $photo; ?>" alt="<?php echo $member['name']; ?>">
									<?php if( $networks = $member['social_networks'] ){ ?>
									<div class="social-networks">
										<ul class="group">
											<?php foreach( $networks as $network ){ ?>
												<li>
													<a href="<?php echo $network['social_networks_url']; ?>" class="icon-alone <?php if($network['social_networks_name'] == 'Share' || $network['social_networks_name'] == 'RSS') { echo 'fs-16'; } ?>">
														<span aria-hidden="true" data-icon="<?php echo $share_icons_code[ $network['social_networks_name'] ]; ?>"></span>
														<span class="screen-reader-text"><?php echo $network['social_networks_name']; ?></span>
													</a>
												</li>
											<?php } ?>	
										</ul>
									</div>
									<?php }	?>
								</figure>
							<?php } ?>
							<strong class="name fs-16"><?php echo $member['name']; ?></strong>
							<span class="position fs-12"><?php echo $member['responsible_for']; ?></span>
						</div>
					</li>
			<?php } ?>
		</ul>
		<?php } ?>	     
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