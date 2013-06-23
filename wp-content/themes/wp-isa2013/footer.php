<footer id="ft-wrapper">
	<?php global $baseUrl; ?>
	<div class="centered">
		<section class="fb-widget clr">
			<h1 class="title fw-light c-green">Faça parte da conferência</h1>
			<img src="<?php echo $baseUrl; ?>/img/facebook-widget.jpg" height="68" width="951" alt="">
		</section>
		<section class="diamond-sponsor itau-big-banner">
			<h2 class="title c-gray fw-light">Patrocinador Diamante</h2>
			<img src="<?php echo $baseUrl; ?>/img/itau-big-banner.jpg" height="275" width="950" alt="">
		</section>
		<section class="sponsors">
			<div class="left box">
				<h3 class="underlined-title fs-16 c-gray">Patrocinadores Prata</h3>
				<img src="<?php echo $baseUrl; ?>/img/sponsors/rosenfeld-brand.jpg" height="82" width="310" alt="">
			</div>
			<div class="right box">
				<h3 class="underlined-title fs-16 c-gray">Patrocinadores Bronze</h3>
				<img src="<?php echo $baseUrl; ?>/img/sponsors/sponsors-brand.jpg" height="82" width="629" alt="">
			</div>
			<div class="clr mb-30">
				<h4 class="underlined-title c-gray fs-14">Apoiadores</h4>
				<img src="<?php echo $baseUrl; ?>/img/sponsors/supporters-brand.jpg" height="56" width="680" alt="">
			</div>
			<p class="fs-12 ff-roboto c-gray">Quer patrocinar o <a href="#">#ISA13?</a> Baixe nosso Media Kit ou envie um e-mail para <a href="#">patrocinio@ixdarecife.org</a></p>
		</section>
	</div>
	<div id="ft-bar">
		<div class="centered group">
			<ul class="credits group">
				<li>
					<span class="credits-label ff-roboto">Realização</span>
					<a href="#">
					<img src="<?php echo $baseUrl; ?>/img/ixda-recife-brand.png" height="35" width="84" alt="">
					</a>
				</li>
				<li>
					<span class="credits-label ff-roboto">Organização</span>
					<a href="#">
					<img src="<?php echo $baseUrl; ?>/img/mkt-hppn-brand.png" height="35" width="127" alt="">
					</a>
				</li>
			</ul>
			<p class="ff-roboto fs-12 c-gray">Interaction South America 2013 - Copyleft © 2013 todo conteúdo pode ser reproduzido desde que mencionado a fonte.<br>
			<span class="c-gray-light">Fale com a organização</span>: <a href="#">contato@ixdarecife.org</a> | +55 31 9919.4565</p>
		</div>
	</div>
</footer>
<!--[if lt IE 9]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $baseUrl; ?>/js/jquery-2.0.0.min.js"><\/script>')</script>
<!--<![endif]-->
<script src="<?php echo $baseUrl; ?>/js/hover-dropdown.min.js"></script>
<script src="<?php echo $baseUrl; ?>/js/isa2013.fn.js"></script>
<?php wp_footer(); ?>
</body>
</html>