<?php  
Class Geral{
	public static function rv_log( $objeto ){
		echo "<pre>";
		print_r( $objeto );
		echo "</pre>";
	}

	function my_excerpt($excerpt = '', $excerpt_length = 50, $readmore = "Continue Reading »",$tags = '<a>') {
	    global $post;
	    $excerpt = strip_tags( $excerpt );
	    $string_check = explode(' ', $excerpt);
	    if (count($string_check, COUNT_RECURSIVE) > $excerpt_length) :
			$new_excerpt_words = explode(' ', $excerpt, $excerpt_length+1);
			array_pop($new_excerpt_words);
			$excerpt_text = implode(' ', $new_excerpt_words);
			$temp_content = strip_tags($excerpt_text, $tags);
			$short_content = preg_replace('`\[[^\]]*\]`','',$temp_content);
			$short_content .= $readmore;
	      	return $short_content;
	    else: 
	       	return $excerpt;
	    endif;  
	}
	function rv_query( $args ){
		$rvQ = new WP_Query();
		$rvQ->query( $args );
		return $rvQ;
	}
	function serachAttachments( $busca, $tipo ){
		global $wpdb;
		$query = "
			SELECT 
			p.ID, pm.meta_value
			FROM $wpdb->postmeta pm
			INNER JOIN $wpdb->posts p ON p.ID = pm.post_id 
			WHERE 
				pm.meta_key LIKE '%$tipo%'
			AND pm.meta_value LIKE '%$busca%'
			AND p.post_status = 'publish'
			GROUP BY p.ID";
		$results = $wpdb->get_results( $query, OBJECT);
		return $results;
	}

	function searchEditais( $busca ){
		global $wpdb;
		$query = "
		SELECT * FROM $wpdb->posts 
		WHERE post_type = 'editais'
		AND(
				post_content LIKE '%$busca%' OR
				post_title LIKE '%$busca%' OR
				post_excerpt LIKE '%$busca%' 
			)
		";
		$results = $wpdb->get_results( $query, OBJECT);
		return $results;
	}
	function searchByCategory( $busca, $category ){
		global $wpdb;
		$query = "
		SELECT * FROM $wpdb->posts p
		INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
		INNER JOIN $wpdb->term_taxonomy tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
		INNER JOIN $wpdb->terms t ON t.term_id = tt.term_id
			AND t.slug = '$category' 
		WHERE(
				post_content LIKE '%$busca%' OR
				post_title LIKE '%$busca%' OR
				post_excerpt LIKE '%$busca%' 
			)
		";
		$results = $wpdb->get_results( $query, OBJECT);
		return $results;
	}
}
?>