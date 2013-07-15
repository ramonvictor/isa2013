<?php
require_once "class/PostType.class.php";
require_once "class/Geral.class.php";
require_once "class/GeneralSettings.class.php";

$baseUrl = get_bloginfo("template_url");
$homeUrl = get_bloginfo("url");
$share_icons_code =  array(
          'Share' => '&#x73;',
          'Facebook' => '&#x66;',
          'Twitter' => '&#x74;',
          'LinkedIn' => '&#x6c;',
          'Google Plus' => '&#x67;',
          'RSS' => '&#x72;'
        );

add_theme_support('post-thumbnails');

define('ICL_LANGUAGE_CODE', true);

add_image_size('article-owner-thumb', 145, 195, true );
add_image_size('speaker-thumb', 180, 200, true );
add_image_size('speaker-medium', 310, 410, true );
add_image_size('keynote-thumb', 120, 90, true );
add_image_size('book-thumb', 120, 160, true );

// remove visual edit on schedule page
add_filter( 'user_can_richedit', 'rv_page_can_richedit' );

function rv_page_can_richedit( $can ) 
{
    global $post;
    if ( 34 == $post->ID ){
      return false;
    }  

    return $can;
}


function rv_get_tweets( $t_username, $t_length ){

    $twitteruser = $t_username;
    $notweets = $t_length;

    require_once 'class/twitteroauth/twitteroauth.php';
    require_once 'class/twitteroauth/privatekeys.php';
    
    $c = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $tweets = $c->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
    $tweets = json_encode($tweets, true);
    return json_decode($tweets);
}

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

function rv_get_vimeo_id( $video_url ){
  sscanf(parse_url($video_url, PHP_URL_PATH), '/%d', $video_id);
  return $video_id;
} 

//change logo admin
function rv_custom_login_logo() {
    echo '<style type="text/css">
        #login h1 a{height:68px;background: url('. get_bloginfo('template_url') .'/img/isa-2013-brand.png) no-repeat center 0;background-size:291px 68px}
    </style>';
}
add_action('login_head', 'rv_custom_login_logo');

// admin css
function custom_css() {
    echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/css/admin.css" />';
}
add_action('admin_head', 'custom_css');

// Settings

// $field = new GeneralSettings( "Facebook likebox", "fb-likebox", "text" );
// $field = new GeneralSettings( "Twitter usuário", "twitter-widget-name", "text" );

add_filter('body_class', 'rv_body_class');
function rv_body_class($classes) {
  global $wpdb, $post;
  if (!is_home()) {
        $classes[] = 'interna';
  }
  return $classes;
}

function get_grupos_tags(){
  if( function_exists( "tag_groups_cloud" ) ){
    return tag_groups_cloud( array( 'orderby' => 'count', 'order' => 'DESC' ), true );    
  }else{
    return false;
  }
}
add_action('init', "rv_init");

function rv_init(){
  PostType::register("Palestras", "palestras", "Palestra", "F", true);
  PostType::register("Artigos", "artigos", "Artigo", "M", true);
  
  // WPML prevent add files on theme
  define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
  define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
  define('ICL_DONT_LOAD_LANGUAGES_JS', true);
}


register_nav_menu( 'principal', 'Menu Principal' );
// register_nav_menu( 'principal-en', 'Menu Principal(en)' );
function clean_custom_menus($menu_name, $lang = "pt") {
  global $homeUrl;
  if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $menu_list .= "\t\t\t\t". '<ul class="main-nav-list group" >' ."\n";

    foreach ((array) $menu_items as $key => $menu_item) {
      $currentClass = "";
      $title = $menu_item->title;
      $url = $menu_item->url;
      $parent = $menu_item->menu_item_parent; 

      if($url == rv_get_current_url()){
        $currentClass = 'class="current"';
      }

      if(!$parent){
        $i = 0;
        if($menu_items[$key+1]->menu_item_parent){
          $has_sub = ' class="dropdown"';
          $menu_list .= "\t\t\t\t\t". '</li><li'.$has_sub.'><a href="'.$url.'" title="Ir para: '. $title .'" tabindex="2"  data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">'. $title .'<span class="subnav-arrow"></a>';
        }else{
           $menu_list .= "\t\t\t\t\t". '</li><li '. $currentClass .'><a href="'. $url .'"  title="Ir para: '. $title .'" tabindex="'.($key+2).'">'. $title .'</a>';
        }
      }else{
        if($i == 0){ $menu_list .= '<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" >'; }
        $i++;
        if(!$menu_items[$key+1]->menu_item_parent){
          $menu_list .= '<li class="last" ><a href="'. $url .'" title="Ir para: '. $title .'" tabindex="'.($key+2).'">'. $title .'</a></li>';
          $menu_list .= '</ul>';
        }else{
          $menu_list .= '<li><a href="'. $url .'" title="Ir para: '. $title .'" tabindex="'.($key+2).'">'. $title .'</a></li>';
        }          
       }
    }

    $menu_list .= '<li class="right"><a href="' . $homeUrl . '/secao/blog">Blog</a></li>';

    $menu_list .= "\t\t\t\t". '</ul>' ."\n";
  } else {
    $menu_list = '<!-- no list defined -->';
  }
  echo $menu_list;
} 