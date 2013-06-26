<div id="sidebar">
		<div class="mb-30 group">
			<h3 class="sidebar-title">Pelo Facebook</h3>
			<div class="facebook-users group gray-rd-box">
				<div class="fb-like-box" data-href="https://www.facebook.com/InteractionSouthAmerica" data-width="285px" data-height="300" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
			</div>
			<!-- <a href="https://www.facebook.com/InteractionSouthAmerica" class="orange-btn fs-15 fw-bold">+ curtir</a> -->
		</div>
		<div class="group">
			<h3 class="sidebar-title">Pelo Twitter</h3>
			<div class="twiiter-list-group">
				<?php 
					$name = 'ramonvictor';
					// $url = "http://api.twitter.com/1/statuses/user_timeline/".$name.".json?count=5";
					// make request
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "http://api.twitter.com/1/statuses/user_timeline/".$name.".json?count=5"); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					$output = curl_exec($ch);   

					// convert response
					$output = json_decode($output);

					// handle error; error output
					if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
					  var_dump($output);
					}
					var_dump($output);

					curl_close($ch);
				?>
				<?php if( count($tweets) ){ ?>
				<ul>
					<?php foreach($tweets as $tweet) { ?>
					<li>
						<div class="twitter-widget-hd group">
							<figure class="thumb">
								<a href="#"><img src="<?php echo $baseUrl; ?>/img/twitter-thumb.jpg" height="35" width="35" alt=""></a>
							</figure>
							<a href="#" class="twitter-name fw-bold fs-16">@<?php echo $name; ?></a>
						</div>
						<div class="twitter-widget-body">
							<p><?php echo $tweet->text; ?></p>
						</div>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
			<a href="#" class="orange-btn fs-15 fw-bold">+ seguir</a>
		</div>
	</div>