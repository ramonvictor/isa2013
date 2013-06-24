<?php  
Class Terms{
	public static function get_tipo_edital( $post_id ){
		$termPai = Terms::get_term_pai( $post_id, "tipo");
		$tipoEdital = (object)array(  	"class" => "",
			                            "tiop" => "",
			                            "icone" => "" );          
		if( $termPai == "editais-de-incentivo" ){
			$tipoEdital->class = "incentivo";
			$tipoEdital->tipo = "Incentivo";
		}else if( $termPai == "editais-de-licitacao" ){
			$tipoEdital->class = "licitacao";
			$tipoEdital->tipo = "Licitação";
			$tipoEdital->icone = "green-";
		}
		return $tipoEdital;
	}
	public static function get_the_sub_term( $id, $taxonomy ){
		$arrayTerms = get_the_terms( $id,$taxonomy );
		foreach( $arrayTerms as $term ){
			if( $term->parent != 0 ){
				return $term->name;
			}
		}
		return "";
	}

	public static function get_term_pai( $id, $taxonomy ){
		$arrayTerms = get_the_terms( $id,$taxonomy );
		foreach( $arrayTerms as $term ){
			if( $term->parent == 0 ){
				return $term->slug;
			}
		}
		return "";
	}

	public static function get_sub_terms( $slug, $taxonomy ){
		$term = get_term_by( "slug", $slug, $taxonomy ); 
		$idParent = $term->term_id;
		$subTerms = get_term_children( $idParent, "tipo" );
		return $subTerms; 	
	}

	public static function get_categoria_atual( $categoria ){
		$idCategory = get_cat_ID( $categoria );
		$category = get_category( $idCategory );
		return $category;
	}

	public static function get_posts_by_array_categories( $categories = array(), $postsPerPage = 0 ){
		global $wpdb;
		$query = "
		SELECT * FROM $wpdb->posts p
		INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
		INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
		INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id 
		WHERE EXISTS (
				SELECT * FROM  $wpdb->terms t WHERE t.slug = 'noticias' AND t.slug = 'destaque'
			)
		GROUP BY p.ID
		$limit
		";
		echo $query;
	}	

	public static function get_category_post( $categorias = array() , $pai ){
		foreach( $categorias as $categoria ){
			if( $categoria->category_parent == $pai->term_id ){
				return $categoria->name;
			}
		}
		return $pai->name;
	}	

}
?>