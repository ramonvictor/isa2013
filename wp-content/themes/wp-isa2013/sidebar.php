<div id="sidebar">
	<?php 
		$rv_query = new WP_Query();
		$args = array( "pagename" => "atracoes");
		$rv_query->query($args);
		
		if( $rv_query->have_posts() ){
			$rv_query->the_post(); 
	?>
		<h2 class="sidebar-main-title">Atrações</h2>
		<ul class="attractions-list">
			<?php if( $headlines = get_field('headlines') ){ ?>
				<?php foreach( $headlines as $headline ){ ?>
					<li><h3 class="title c-orange"><?php echo $headline['headline_title']; ?></h3>
						<div class="entry ff-roboto">
							<?php echo $headline['headline_content']; ?>
						</div>
					</li>
				<?php } ?>
			<?php }	?>					
		</ul>		
	<?php }	?>	
</div>