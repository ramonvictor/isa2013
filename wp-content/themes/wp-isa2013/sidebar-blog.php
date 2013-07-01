<div id="sidebar">
		<div class="mb-30 group">
			<h3 class="sidebar-title">Pelo Facebook</h3>
			<div class="facebook-users group gray-rd-box">
				<div class="fb-like-box" data-href="https://www.facebook.com/InteractionSouthAmerica" data-width="285px" data-height="300" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
			</div>
			<!-- <a href="https://www.facebook.com/InteractionSouthAmerica" class="orange-btn fs-15 fw-bold">+ curtir</a> -->
		</div>
		<?php $tweets = rv_get_tweets("ISAmerica13", 4); ?>
		<?php if ($tweets) { ?>
		<div class="group">
			<h3 class="sidebar-title">Pelo Twitter</h3>
			<div class="twiiter-list-group">
				<ul>
					<?php foreach ($tweets as $tweet) { ?>
					<li>
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
					</li>
					<?php } ?>
				</ul>
			</div>
			<a href="https://twitter.com/ISAmerica13" class="orange-btn fs-15 fw-bold">+ seguir</a>
		</div>
		<?php } ?>		
	</div>