</div><!-- /#main-content -->
<footer id="ft-wrapper">
	<?php global $baseUrl; ?>
	<div class="centered">
		<section class="fb-widget clr">
			<h1 class="title fw-light c-green">Faça parte da conferência</h1>
			<div class="hrz-facebook-widget">
				<div class="fb-like-box" data-href="https://www.facebook.com/InteractionSouthAmerica" data-width="980" data-height="170" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
			</div>
		</section>
		<section class="diamond-sponsor itau-big-banner">
			<h2 class="title c-gray fw-light">Patrocinador Diamante</h2>
			<img src="<?php echo $baseUrl; ?>/img/sponsors/itau-big-banner.jpg" height="275" width="950" alt="">
			<a href="http://www.facebook.com/itau" class="facebook-link skip">Itaú no Facebook</a>
			<a href="http://www.twitter.com/itau" class="twitter-link skip">Itaú no Twitter</a>
		</section>
		<section class="sponsors">
			<div class="left box sponsors-silver">
				<h3 class="underlined-title fs-16 c-gray">Patrocinadores Prata</h3>
				<img src="<?php echo $baseUrl; ?>/img/sponsors/silver/rosenfeld-brand.jpg" height="82" width="310" alt="">
			</div>
			<div class="right box sponsors-bronze">
				<h3 class="underlined-title fs-16 c-gray">Patrocinadores Bronze</h3>
				<ul class="sponsors-bronze-list group">
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/bronze/voel-brand.png" height="82" width="94" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/bronze/dt-brand.png" height="82" width="60" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/bronze/gouge-brand.png" height="82" width="105" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/bronze/wezen-brand.png" height="82" width="94" alt=""></a></li>
					<li class="last"><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/bronze/tritone-brand.png" height="82" width="93" alt=""></a></li>
				</ul>
			</div>
			<div class="clr mb-30">
				<h4 class="underlined-title c-gray fs-14">Apoiadores</h4>
				<ul class="supporters-list group">
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/cesar-brand.png" height="56" width="63" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/cesar-edu-brand.png" height="56" width="63" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/2abad-brand.png" height="56" width="67" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/welab-brand.png" height="56" width="52" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/smaply-brand.png" height="56" width="56" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/robolivre-brand.png" height="56" width="95" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/gonow-brand.png" height="56" width="74" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/try-brand.png" height="56" width="51" alt=""></a></li>
					<li><a href="#"><img src="<?php echo $baseUrl; ?>/img/sponsors/supporters/pagseguro-brand.png" height="56" width="97" alt=""></a></li>
				</ul>
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
<script src="<?php echo $baseUrl; ?>/js/cycle.js"></script>
<script src="<?php echo $baseUrl; ?>/js/isa2013.fn.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php wp_footer(); ?>
</body>
</html>