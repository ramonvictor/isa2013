<?php 
Class PostType{

	function register( $nome, $slug , $nomeSingular, $genero, $hierarchical = false ) {
  
	  if( $genero == "M"){
	  	$adicionar = "Adicionar novo ".$nomeSingular; 
	  }else{
	  	$adicionar = "Adicionar nova ".$nomeSingular; 
	  }
	  $labels = array(
	      'name' => _x($nome, 'post type general name'),
	      'singular_name' => _x( $nomeSingular , 'nome singular'),
	      'add_new' => _x('Adicionar', $nome ),
	      'add_new_item' => __( $adicionar ),
	      'edit_item' => __('Adicionar '.$nome),
	      'new_item' => __('Novo '.$nomeSingular ),
	      'view_item' => __('Ver '.$nome ),
	      'search_items' => __('Buscar '.$nome),
	      'not_found' =>  __('Nada foi encontrado'),
	      'not_found_in_trash' => __('Nada foi encontrado na lixeira'),
	      'parent_item_colon' => ''
	  );

	  $args = array(
	      'labels' => $labels,
	      'public' => true,
	      'publicly_queryable' => true,
	      'show_ui' => true,
	      'query_var' => true,
	      'menu_icon' => get_stylesheet_directory_uri() . '/css/i/nav-admin.png',
	      'rewrite' => true,
	      'capability_type' => 'post',
	      'hierarchical' => $hierarchical,
	      'menu_position' => null,
	      'supports' => array('title','editor','thumbnail','page-attributes', 'comments'),
	      'has_archive' => true
	  ); 

	    register_post_type( $slug , $args );
	    flush_rewrite_rules();

	}

	function registrar_taxonomia( $nome, $slug , $nomeSingular, $genero, $hierarchical = true, $postsTypes = array() ){
		if( $genero == "M"){
			$adicionar = "Adicionar novo ".$nomeSingular;
		}else{
			$adicionar = "Adicionar nova ".$nomeSingular;
		}
		$labels = array(
	    'name'                => _x( $nome, 'nome da taxonomia' ),
	    'singular_name'       => _x( $nomeSingular, 'nome singular da taxonomia' ),
	    'search_items'        => __( 'Buscar '.$nome ),
	    'all_items'           => __( 'Todos '.$name ),
	    'parent_item'         => __( 'Parent '.$nomeSingular ),
	    'parent_item_colon'   => __( 'Parent '.$nomeSingular.':' ),
	    'edit_item'           => __( 'Editar '.$nomeSingular ), 
	    'update_item'         => __( 'Atualizar '.$nomeSingular ),
	    'add_new_item'        => __( $adicionar ),
	    'menu_name'           => __( $nomeSingular ),
	    "public" 			  => "true"
	  ); 	

	  $args = array(
	    'hierarchical'        => $hierarchical,
	    'labels'              => $labels,
	    'show_ui'             => true,
	    'show_admin_column'   => true,
	    'query_var'           => true,
	    'rewrite'             => array( 'slug' => $slug )
	  );
	  register_taxonomy( $slug , $postsTypes , $args );
	  flush_rewrite_rules();
	}
}
?>