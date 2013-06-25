<?php 
	if( get_post_type() == "palestras"){
		require_once "single-palestras.php";
	} else if(in_category('blog') || in_category('citacao')){
		require_once "single-blog.php";
	} else {
		require_once "single-default.php";
	}
?>