<?php
/// ADD DROPDOWN PRODUCT CAT SELECTION

wpcf7_add_shortcode('postdropdown_prodotti_cat', 'createbox_prodotti_categorie', true);
	function createbox_prodotti_categorie(){
		$args = array(
		       'taxonomy' => 'product_cat',
		       'hide_empty'  => true
		   );
		$terms = get_terms($args);
		$output = "<select name='scegli-categoria' id='scegli-categoria' onchange='document.getElementById(\"scegli-categoria\").value=this.value;'><option> --- </option>";
		foreach ( $terms as $term) {
			$term_name = $term->name;
			$term_slug = $term->slug;
            $output .= "<option value='$term_slug'> $term_name </option>";
			}
		$output .= "<option value='richiesta_generica'> Ho una richiesta generica.. </option>";
		$output .= "</select>";
	return $output;
}


/// ADD DROPDOWN PRODUCT CAT SELECTION

wpcf7_add_shortcode('postdropdown_mobility_rent', 'createbox_mobility_rent', true);
	function createbox_mobility_rent(){
		global $post;
		$args = array(
			'numberposts' => -1,
			'post_type' => 'product',
			'orderby' => 'title',
			'order' => 'ASC',
			'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).
			    'relation' => 'AND',
			     array(
			        'taxonomy' => 'product_cat',
			        'field' => 'slug',
			        'terms' => array( 'mobility-rent' ),
			        'operator' => 'IN'
			      )
			  )
		);
		$myposts = get_posts( $args );
		$output = "<select name='scegli-prodotto' id='scegli-prodotto' onchange='document.getElementById(\"scegli-prodotto\").value=this.value;'><option> --- </option>";
		foreach ( $myposts as $post) : setup_postdata($post);
			$product_title = get_the_title();
			$product_slug = $post->post_name;
            $output .= "<option value='$product_slug'> $product_title </option>";
			endforeach;
		$output .= "</select>";
	return $output;
}

wpcf7_add_shortcode('postdropdown_client_rent', 'createbox_client_rent', true);
	function createbox_client_rent(){
		global $post;
		$args = array(
			'numberposts' => -1,
			'post_type' => 'product',
			'orderby' => 'title',
			'order' => 'ASC',
			'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).
			    'relation' => 'AND',
			     array(
			        'taxonomy' => 'product_cat',
			        'field' => 'slug',
			        'terms' => array( 'client-rent' ),
			        'operator' => 'IN'
			      )
			  )
		);
		$myposts = get_posts( $args );
		$output = "<select name='scegli-prodotto' id='scegli-prodotto' onchange='document.getElementById(\"scegli-prodotto\").value=this.value;'><option> --- </option>";
		foreach ( $myposts as $post) : setup_postdata($post);
			$product_title = get_the_title();
			$product_slug = $post->post_name;
            $output .= "<option value='$product_slug'> $product_title </option>";
			endforeach;
		$output .= "</select>";
	return $output;
}

wpcf7_add_shortcode('postdropdown_server_rent', 'createbox_server_rent', true);
	function createbox_server_rent(){
		global $post;
		$args = array(
			'numberposts' => -1,
			'post_type' => 'product',
			'orderby' => 'title',
			'order' => 'ASC',
			'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).
			    'relation' => 'AND',
			     array(
			        'taxonomy' => 'product_cat',
			        'field' => 'slug',
			        'terms' => array( 'server-rent' ),
			        'operator' => 'IN'
			      )
			  )
		);
		$myposts = get_posts( $args );
		$output = "<select name='scegli-prodotto' id='scegli-prodotto' onchange='document.getElementById(\"scegli-prodotto\").value=this.value;'><option> --- </option>";
		foreach ( $myposts as $post) : setup_postdata($post);
			$product_title = get_the_title();
			$product_slug = $post->post_name;
            $output .= "<option value='$product_slug'> $product_title </option>";
			endforeach;
		$output .= "</select>";
	return $output;
}

wpcf7_add_shortcode('postdropdown_workstation_rent', 'createbox_workstation_rent', true);
	function createbox_workstation_rent(){
		global $post;
		$args = array(
			'numberposts' => -1,
			'post_type' => 'product',
			'orderby' => 'title',
			'order' => 'ASC',
			'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).
			    'relation' => 'AND',
			     array(
			        'taxonomy' => 'product_cat',
			        'field' => 'slug',
			        'terms' => array( 'workstation-rent' ),
			        'operator' => 'IN'
			      )
			  )
		);
		$myposts = get_posts( $args );
		$output = "<select name='scegli-prodotto' id='scegli-prodotto' onchange='document.getElementById(\"scegli-prodotto\").value=this.value;'><option> --- </option>";
		foreach ( $myposts as $post) : setup_postdata($post);
			$product_title = get_the_title();
			$product_slug = $post->post_name;
            $output .= "<option value='$product_slug'> $product_title </option>";
			endforeach;
		$output .= "</select>";
	return $output;
}
?>
