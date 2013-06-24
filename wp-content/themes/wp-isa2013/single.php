<?php 
	if( get_post_type() == "palestras"){
		require_once "single-palestras.php";
	} else {
		require_once "single-default.php";
	}
?>