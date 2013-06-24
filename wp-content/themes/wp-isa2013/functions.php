<?php
require_once "class/PostType.class.php";
require_once "class/GeneralSettings.class.php";

$baseUrl = get_bloginfo("template_url");
$homeUrl = get_bloginfo("url");

add_theme_support('post-thumbnails');

// add_image_size('slide_home', 320, 238, true );

// Current url

function rv_get_current_url(){
  $protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
  return $protocol . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}


function rv_get_youtube_id( $video_url ){
  // $video_url = 'http://www.somesite.com/index.php?url=var&file_id=var&test=var';
  $url = parse_url($video_url);
  $query = array();
  parse_str($url['query'], $query);
  return $query['v'];
}


//change logo admin
function rv_custom_login_logo() {
    echo '<style type="text/css">
        #login h1 a{height:68px;background: url('. get_bloginfo('template_url') .'/img/isa-2013-brand.png) no-repeat center 0;background-size:291px 68px}
    </style>';
}
add_action('login_head', 'rv_custom_login_logo');

$field = new GeneralSettings( "Facebook likebox", "fb-likebox", "text" );
// $field = new GeneralSettings( "Twitter widget ID", "twitter-widget-id", "text" );
$field = new GeneralSettings( "Twitter usuário", "twitter-widget-name", "text" );

add_filter('body_class', 'is_not_home_class');

function get_grupos_tags(){
  if( function_exists( "tag_groups_cloud" ) ){
    return tag_groups_cloud( array( 'orderby' => 'count', 'order' => 'DESC' ), true );    
  }else{
    return false;
  }
}
add_action('init', "rv_init");

function rv_init(){
  PostType::register("Palestras","palestras","Palestra","F", true);
}
