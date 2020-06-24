<?php

register_nav_menus( array(
	'menu-mobile' => esc_html__( 'Mobile Menu', 'twentytwenty' ),
) );

function my_custom_sidebar() {
	register_sidebar(
			array (
					'name' => __( 'Archive Sidebar', 'twentytwenty' ),
					'id' => 'archive-sidebar',
					'description' => __( 'Archive Sidebar', 'twentytwenty' ),
					'before_widget' => '<div class="col-lg-12 col-md-12 col-sm-12 col-12 widget-content">',
					'after_widget' => "</div>",
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
			)
	);
    register_sidebar(
        array (
            'name' => __( 'Footer #3', 'twentytwenty' ),
            'id' => 'third-sidebar',
            'description' => __( 'Third Sidebar', 'twentytwenty' ),
            'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-3 col-6 widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h5 class="widget-title">',
            'after_title' => '</h5>',
        )
    );
		register_sidebar(
				array (
						'name' => __( 'Footer #4', 'twentytwenty' ),
						'id' => 'fourth-sidebar',
						'description' => __( 'Fourth Sidebar', 'twentytwenty' ),
						'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-3 col-6 widget-content">',
						'after_widget' => "</div>",
						'before_title' => '<h5 class="widget-title">',
						'after_title' => '</h5>',
				)
		);
}
add_action( 'widgets_init', 'my_custom_sidebar' );


function twentytwenty_sidebar_registration_child() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h5 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h5>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'twentytwenty' ),
				'id'          => 'sidebar-1',
				'before_title' => '<h5 class="widget-title">',
				'after_title' => '</h5>',
				'before_widget' => '<div class="widget-content">',
				'after_widget' => "</div>",
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'twentytwenty' ),
				'id'          => 'sidebar-2',
				'before_title' => '<h5 class="widget-title">',
				'after_title' => '</h5>',
				'before_widget' => '<div class="widget-content">',
				'after_widget' => "</div>",
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);

}
add_action( 'widgets_init', 'twentytwenty_sidebar_registration_child', 15 );




/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_4_child_theme_scripts() {
	wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'roboto', get_stylesheet_directory_uri() . '/css/roboto.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'roboto' );
	wp_register_style( 'roboto-condensed', get_stylesheet_directory_uri() . '/css/roboto-condensed.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'roboto-condensed' );
	wp_register_style( 'btf', get_stylesheet_directory_uri() . '/css/btf.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'btf' );
	wp_register_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'animate' );
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), null, true );
	wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'paroller', get_stylesheet_directory_uri() . '/js/jquery.paroller.min.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_4_child_theme_scripts' );


// INSERIRE POST THUMB IN ADMIN POST LIST PAGE

add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
		echo the_post_thumbnail( array(50,999999999) );
      //  echo the_post_thumbnail( 'featured-thumbnail' );
    }
}

// Aggiungere ID ai post, pagine

add_filter( 'manage_posts_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 6, 2 );
add_filter( 'manage_pages_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_pages_custom_column', 'revealid_id_column_content', 6, 2 );
add_filter( 'manage_media_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_media_custom_column', 'revealid_id_column_content', 6, 2 );
add_filter( 'manage_project_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_project_custom_column', 'revealid_id_column_content', 6, 2 );


function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}


// MOBILE
function my_wp_is_mobile() {
    static $is_mobile;

    if ( isset($is_mobile) )
        return $is_mobile;

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
            $is_mobile = true;
    } elseif (strstr($_SERVER['HTTP_USER_AGENT'],'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}

// TABLET
function my_wp_is_tablet() {
	static $is_tablet;

	if ( isset($is_tablet) )
			return $is_tablet;

	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) {
	  $is_tablet = true;
	} elseif(strstr($_SERVER['HTTP_USER_AGENT'],'tablet')) {
		$is_tablet = true;
	} else {
		$is_tablet = false;
	}
	  return $is_tablet;
}


// GET IMAGE META DATA
function wp_get_attachment( $attachment_id ) {

$attachment = get_post( $attachment_id );
return array(
    'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
    'caption' => $attachment->post_excerpt,
    'description' => $attachment->post_content,
    'href' => get_permalink( $attachment->ID ),
    'src' => $attachment->guid,
    'title' => $attachment->post_title
);
}


// GET IMAGE METADATA ON UPLOAD
/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {
		$my_image_title = get_post( $post_ID )->post_title;
		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );
		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
			'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);
		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );
		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );
	}
}

// LOAD SVG
// function add_file_types_to_uploads($file_types){
// $new_filetypes = array();
// $new_filetypes['svg'] = 'image/svg+xml';
// $file_types = array_merge($file_types, $new_filetypes );
// return $file_types;
// }
// add_action('upload_mimes', 'add_file_types_to_uploads');
//
// function cc_mime_types($mimes) {
//  $mimes['svg'] = 'image/svg+xml';
//  return $mimes;
// }
// add_filter('upload_mimes', 'cc_mime_types');


/**
* @snippet Hide Price & Add to Cart for Logged Out Users
*/

add_action( 'init', 'hide_price_add_cart_not_logged_in' );

function hide_price_add_cart_not_logged_in() {
	if ( !is_user_logged_in() ) {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title');
	add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_title', 5);
	}
}

// add_action('woocommerce_after_shop_loop_item', 'add_price_in_loop');
// function add_price_in_loop(){
// 	include( get_stylesheet_directory() . '/include/prices.php');
// }



// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

add_action( 'woocommerce_before_shop_loop', 'add_filters' );
function add_filters() {
	include( get_stylesheet_directory() . '/woocommerce/woo-archive-filters.php');
}

add_action( 'woocommerce_product_meta_end', 'add_cta' );
function add_cta() {
	include( get_stylesheet_directory() . '/include/cta.php');
}
// add_action( 'woocommerce_product_thumbnails', 'add_energy_label', 25 );
// function add_energy_label() {
// 	global $post;
// 	$post_id = $post->ID;
// 	$terms = wp_get_post_terms( $post_id, 'product_tag' );
// 	foreach ( $terms as $term ) $categories[] = $term->slug;
// 	if ( in_array( 'telefono', $categories ) ) {
// 		echo "<div class='energy_label'>Questo prodotto ha un coefficiente energetico <span>A++</span></div>";
// 	} else {
// 		echo "<div class='energy_label'>Questo prodotto ha un coefficiente energetico <span>A</span></div>";
// 	}
// }
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_product_thumbnails', 'woocommerce_template_single_meta', 40 );


// add_action( 'woocommerce_before_single_product_summary', 'add_breadcrumbs', 15 );
// function add_breadcrumbs() {
// 	if ( function_exists('yoast_breadcrumb') ) {
// 	  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
// 	}
// }

add_action( 'woocommerce_after_single_product_summary', 'add_gallery' );
function add_gallery() {
	include( get_stylesheet_directory() . '/include/prodotti/gallery.php');
	// include( get_stylesheet_directory() . '/include/prodotti/vantaggi.php');
}

add_action( 'woocommerce_after_single_product_summary', 'add_form_prodotto', 12 );
function add_form_prodotto() {
	include( get_stylesheet_directory() . '/include/prodotti/form_prodotto.php');
}



# Show Custom Content When Short Description Empty
// add_action( 'woocommerce_single_product_summary', 'bbloomer_echo_short_desc_if_empty', 21 );
//
// function bbloomer_echo_short_desc_if_empty() {
//    global $post;
//    if ( empty ( $post->post_excerpt  ) ) {
//       $post_excerpt = '<p class="default-short-desc">';
//         $post_excerpt .= 'This is the default, global, short description.<br>It will show if <b>no short description has been entered!</b>';
//         $post_excerpt .= '</p>';
//       echo $post_excerpt;
//    }
// }

include( get_stylesheet_directory() . '/include/form_functions.php');


/*
Plugin Name: Remove product-category slug
Plugin URI: https://timersys.com/
Description: Check if url slug matches a woocommerce product category and use it instead
Version: 0.1
Author: Timersys
License: GPLv2 or later
*/
add_filter('request', function( $vars ) {
    global $wpdb;
    if( ! empty( $vars['pagename'] ) || ! empty( $vars['category_name'] ) || ! empty( $vars['name'] ) || ! empty( $vars['attachment'] ) ) {
        $slug = ! empty( $vars['pagename'] ) ? $vars['pagename'] : ( ! empty( $vars['name'] ) ? $vars['name'] : ( !empty( $vars['category_name'] ) ? $vars['category_name'] : $vars['attachment'] ) );
        $exists = $wpdb->get_var( $wpdb->prepare( "SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s" ,array( $slug )));
        if( $exists ){
            $old_vars = $vars;
            $vars = array('product_cat' => $slug );
            if ( !empty( $old_vars['paged'] ) || !empty( $old_vars['page'] ) )
                $vars['paged'] = ! empty( $old_vars['paged'] ) ? $old_vars['paged'] : $old_vars['page'];
            if ( !empty( $old_vars['orderby'] ) )
                    $vars['orderby'] = $old_vars['orderby'];
                if ( !empty( $old_vars['order'] ) )
                    $vars['order'] = $old_vars['order'];
        }
    }
    return $vars;
});

// create two taxonomies, genres and writers for the post type "book"
function ctech_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)

	$labels = array(
		'name'              => _x( 'Tipologie', 'taxonomy general name' ),
		'singular_name'     => _x( 'Tipologia', 'taxonomy singular name' ),
		'search_items'      => __( 'Cerca Tipologia' ),
		'all_items'         => __( 'Tutte le Tipologie' ),
		'parent_item'       => __( 'Parent Tipologia' ),
		'parent_item_colon' => __( 'Parent Tipologia:' ),
		'edit_item'         => __( 'Modifica Tipologia' ),
		'update_item'       => __( 'Aggiorna Tipologia' ),
		'add_new_item'      => __( 'Aggiungi nuova Tipologia' ),
		'new_item_name'     => __( 'New Tipologia Name' ),
		'menu_name'         => __( 'Tipologie' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite' 			=> array('slug' => 'tipologia','with_front' => false)
	);
	register_taxonomy( 'tipologia', array( 'product' ), $args );
}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'ctech_taxonomies', 0 );


add_filter( 'gettext', 'translate_woocommerce_strings', 999, 3 );

function translate_woocommerce_strings( $translated, $untranslated, $domain ) {

   if ( ! is_admin() && 'woocommerce' === $domain ) {
      switch ( $translated) {
         case 'Aggiungi al carrello' :
            $translated = 'Vedi prodotto';
            break;
         // case 'Product Description' :
         //    $translated = 'Product Specifications';
         //    break;
      }
   }

   return $translated;

}

// LIMIT POST SEARCH TO PRODUCTS
function searchfilter($query) {
    if ($query->is_search && !is_admin() && $query->is_main_query() ) {
        $query->set('post_type', 'product');
    }
return $query;
} 
add_filter('pre_get_posts','searchfilter');

// ADD MAILCHIMP TAG
add_filter( 'mc4wp_subscriber_data', function(MC4WP_MailChimp_Subscriber $subscriber) {
	$subscriber->tags[] = 'Sito web';
	return $subscriber;
 });


 // ADD ATTRIBUTE ON IMAGE ON LOAD
// add_filter('the_content','new_content');
// function new_content($content) {
//     $content = str_replace('<img','<img data-src="' . wp_get_attachment_url() . '" loading="lazy" class="lazyload"', $content);
//     return $content;
// }

// function add_lazyload($content) {
// 	$dom = new DOMDocument();
// 	@$dom->loadHTML($content);

// 	foreach ($dom->getElementsByTagName('img') as $node) {  
// 		$oldsrc = $node->getAttribute('src');
// 		$node->setAttribute("data-src", $oldsrc );
// 		$node->setAttribute("loading", "lazy" );
// 		$node->setAttribute("class", "lazyload" );
// 		// $newsrc = ''.get_template_directory_uri().'/library/images/nothing.gif';
// 		// $node->setAttribute("src", $newsrc);
// 	}
// 	$newHtml = $dom->saveHtml();
// 	return $newHtml;
// }
// add_filter('the_content', 'add_lazyload');

// get_stylesheet_directory_uri() . "/js/lazy-loading.js";
?>
