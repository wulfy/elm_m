<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

if ( function_exists('register_sidebar') ){
	 register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));
}

global $the_terms_result;
global $termsdata;


/** @ignore 
function custom_url_head() {
	//update url
	//wp_twitter_id
	//wp_twitter_id" href="http://twitter.com/aflama
	//wp_facebook_id" href="http://www.facebook.com/profile.php?id=53103448
	
	$head = "<script type='text/javascript'><!-- // \n";
	$output = '';
	if ( false !== ( $url = twitter_header_url() ) ) {
		$output .= "document.getElementById('wp_twitter_id').href = 'http://twitter.com/$url';\n";
	}
	if ( false !== ( $url = facebook_header_url() ) ) {
		$output .= "document.getElementById('wp_facebook_id').href = 'http://www.facebook.com/profile.php?id=$url';\n";
	}
	$foot = "// --></script>\n";
	if ( '' != $output )
		echo $head . $output . $foot;
}*/

/**LLY
// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Equipement urbain',      'lmsecurite_2' ),
		'secondary' => __( 'Identification brady',      'lmsecurite_2' ),
		'tertiary' => __( 'Protection securite',      'lmsecurite_2' ),
		'quartiary' => __( 'Signalisation',      'lmsecurite_2' ),
		'social'  => __( 'Social Links Menu', 'lmsecurite_2' ),
	) );
	
	load_theme_textdomain( 'lmsecurite_2', get_template_directory() . '/lang' );
add_action( 'wp_enqueue_scripts', 'mysite_enqueue' );

function mysite_enqueue() {
  $ss_url = get_stylesheet_directory_uri();
  $url = get_site_url();
  //wp_enqueue_script( 'mysite-scripts', "{$url}/custom/js/custom.js" );
}

add_filter('posts_orderby','my_sort_custom',10,2);
function my_sort_custom( $orderby, $query ){
    global $wpdb;

    if(!is_admin() && is_search()) 
        $orderby =  $wpdb->prefix."posts.post_type ASC, {$wpdb->prefix}posts.post_date DESC";

    return  $orderby;
}
//*****************/

/** useless
add_action('wp_footer', 'custom_url_head');

function twitter_header_url_string() {
	$url = twitter_header_url();
	if ( false === $url )
		return '';
	return $url;
}

function facebook_header_url_string() {
	$url = facebook_header_url();
	if ( false === $url )
		return '';
	return $url;
}

function twitter_header_url() {
	return apply_filters('twitter_header_url', get_option('twitter_header_url'));
}

function facebook_header_url() {
	return apply_filters('facebook_header_url', get_option('facebook_header_url'));
}

add_action('admin_menu', 'goldpot_add_theme_page');

function goldpot_add_theme_page() {
	if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {
		if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {
		
				
				if ( isset($_REQUEST['twitterurl']) ) {
					if ( '' == $_REQUEST['twitterurl'] )
						delete_option('twitterurl');
					else {			
						update_option('twitter_header_url', $_REQUEST['twitterurl']);
					}				
				}

				if ( isset($_REQUEST['facebookurl']) ) {
					if ( '' == $_REQUEST['facebookurl'] )
						delete_option('facebookurl');
					else {			
						update_option('facebook_header_url', $_REQUEST['facebookurl']);
					}	
				}
				
			#print_r($_REQUEST);
			wp_redirect("themes.php?page=functions.php&saved=true");
			die;
		}
		add_action('admin_head', 'goldpot_theme_page_head');
	}
	add_theme_page(__('Customize Top Nav Link'), __('Top Nav Links'), 'edit_themes', basename(__FILE__), 'goldpot_theme_page');
}**/


/**
*
*
**/

// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term($term_id);
    // climb up the hierarchy until we reach a term with parent = '0'
    $watchdog = 0;
    while ($parent->parent != '0' && $watchdog<100){
        $term_id = $parent->parent;

        $parent  = get_term($term_id);
        $watchdog++;
    }
    return $parent;
}

function get_mypost_taxonomies($post_id){
	global $wpdb; global $wp_query; 
	$query = $wpdb->prepare ('SELECT term_taxonomy_id FROM '.$wpdb->term_relationships. ' WHERE object_id = %d', $wp_query->queried_object_id);
	$product_categories = $wpdb->get_results( $query );

	return $product_categories;
}

/**
* WPSHOP HELPERS
*/
	function get_categories_custom_func($atts){
		$taxo = $atts[ 'taxonomy' ];
		$content = "";
			if($taxo)
			{
				$terms = get_terms($taxo) ;
				$template_part = 'categories_list';
				foreach($terms as $catid=>$catObj)
				{
					$tpl_component = array();
					$image_post = "";
					$category_thumbnail_preview = "";
					/*$category_meta_information = get_option(WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES . '_' . $catObj->term_id) ;
					if(!empty($category_meta_information['wpshop_category_picture']))
					{
						$image_post = wp_get_attachment_image( $category_meta_information['wpshop_category_picture'], 'thumbnail', false, array('class' => 'category_thumbnail_preview') );
						$category_thumbnail_preview = ( !empty($image_post) ) ? $image_post : '<img src="' .WPSHOP_DEFAULT_CATEGORY_PICTURE. '" alt="No picture" class="category_thumbnail_preview" />';
						//echo var_dump($image);
					}
					//echo $catObj->name . " (" . $catObj->term_id. ") ".$image_post.$category_thumbnail_preview;
					$tpl_component['CAT_NAME'] =$catObj->name;
					$tpl_component['CAT_ID'] =$catObj->term_id;
					$tpl_component['CAT_IMG'] =$catObj->image_post;
					$tpl_component['CAT_THUMB'] =$catObj->category_thumbnail_preview;
					$content = wpshop_display::display_template_element($template_part, $tpl_component);
					unset($tpl_component);*/
					$content .= wpshop_categories::category_mini_output($catObj);
				}
				$content .= var_dump(wpshop_categories::category_tree());
			}
			else
				$content = "hello";


			return $content;
			
	}

	function get_categories_helper_func($atts){
		$base_cat_id = null;
		$base_cat_slug = null;

		if(!empty($atts['base_cat_id']))
			$base_cat_id =$atts['base_cat_id'];

		else if(!empty($atts['base_cat_slug']))
			{
				$base_cat_slug =$atts['base_cat_slug'];
				$the_cat = get_term_by( 'slug', $base_cat_slug,WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES );
				$base_cat_id = $the_cat->term_id;
			}

		$categories = wpshop_categories::category_tree($base_cat_id);
		$content = "<div class='listcontainer'>";
		foreach($categories as $cid=>$data)
		{
			$content .= wpshop_category_func(['cid'=>$cid,'display'=>'only_cat']);
			if($children = wpshop_categories::category_tree($cid)){
				$content .= wpshop_category_func(['cid'=>key($children),'display'=>'only_cat']);
			}
			
		}
		$content .= "</div>";
		return $content;		
	}

	function get_login_container(){
			$tpl_component = array();
			$tpl_component['ACCOUNT_EMAIL'] = "Not connected";
			$tpl_component['ACCOUNT_LOGIN'] = "Not connected";
			$logoutRedirect = get_permalink();//or home_url()
			$tpl_component['LOGOUT_URL'] = wp_logout_url($logoutRedirect);
			$tpl_component['LOGIN_URL'] = get_permalink( get_page_by_path( 'mon-compte'));
			$template = "lm_not_logged_container";

			if(is_user_logged_in ())
			{
			  $current_user = wp_get_current_user(); 			  
			  $tpl_component['ACCOUNT_LOGIN'] =  $current_user->user_login; 
			  $tpl_component['ACCOUNT_EMAIL'] = $current_user->user_email;
			  $template = "lm_logged_container";

			}

			$output = wpshop_display::display_template_element($template, $tpl_component);

			return $output;
	}
	function get_wpshop_category_link($atts){
		if(!empty($atts['base_cat_id']))
			$base_cat_id =$atts['base_cat_id'];

		else if(!empty($atts['base_cat_slug']))
			{
				$base_cat_slug =$atts['base_cat_slug'];
				$the_cat = get_term_by( 'slug', $base_cat_slug,WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES );
				$base_cat_id = $the_cat->term_id;
			}

		return ( !empty($atts) && !empty($base_cat_id) ) ?  get_term_link((int)$base_cat_id , WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES) : '';

	}

	function wpc_comments_closed( $open, $post_id ) {
		$post = get_post( $post_id );
		$open = false;
		return $open;
	}

	function get_link_form_term(){
		$att = array("base_cat_id"=>$term->term_id);
		$link = get_wpshop_category_link($att);
	}

/** ne fonctionne pas
	function my_smart_search( $search, &$wp_query ) {
    global $wpdb;

    if ( empty( $search ))
        return $search;

 	echo "<pre>";
 	print_r($wp_query->query_vars);
 	echo "</pre>";


    $terms = $wp_query->query_vars[ 's' ];
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );
         
    $search = '';
    foreach( $exploded as $tag ) {
        $search .= " AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS
            (
                SELECT * FROM wp_terms
                INNER JOIN wp_term_taxonomy
                    ON wp_term_taxonomy.term_id = wp_terms.term_id
                INNER JOIN wp_term_relationships
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                WHERE wp_term_taxonomy.taxonomy = '".WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES."'
                    AND UPPER(wp_terms.name) LIKE UPPER('%$tag%')
            )
        )";

    }

    return $search;
}
 
//add_filter( 'posts_search', 'my_smart_search', 500, 2 );

**/

function has_terms (){
	global $the_terms_result;
	return sizeof($the_terms_result)>0;
}

function getTermsResults() {
	global $the_terms_result;

	return $the_terms_result;
}

function getTermsData(){
	global $termsdata;

	return $termsdata;
}

function setTermsData($terms){
	global $termsdata;

	foreach($terms as $key=>$term){
		$termsdata[$term->term_id]["link"] = get_term_link(intval($term->term_id));
		$category_meta_information = ( !empty($term) && !empty($term->term_id) ) ? get_option(WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES . '_' . $term->term_id) : '';
		if(isset($category_meta_information['wpshop_category_picture']))
			$image_url = wp_get_attachment_image_url( $category_meta_information['wpshop_category_picture'], 'full', false);//LLA
		$image_url = ( !empty($image_url) ) ? $image_url : WPSHOP_DEFAULT_CATEGORY_PICTURE; //LLA
		$termsdata[$term->term_id]["img"] = $image_url;
	}

}
/** exemple **/
function serach_in_terms($thequery) {

global $wpdb,$the_terms_result; 

$the_terms_result = [];

	if(isset($_GET['s']))
	{
		$search = urldecode($_GET['s']);

	$query = $wpdb->prepare("SELECT T.* FROM " . $wpdb->terms . " AS T INNER JOIN " . $wpdb->term_taxonomy . " AS TT ON T.term_id = TT.term_id WHERE TT.taxonomy = %s AND T.name LIKE %s", WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES , "%".$search."%");

	$result = $wpdb->get_results($query);

	$the_terms_result = $result;
	setTermsData($the_terms_result);
	}	
	
	
}

add_action('pre_get_posts','serach_in_terms');

/** exemple
class mypost {

	 public function __construct( array $arguments = array() ) {
	       if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }         
	 }
}
/**exemple
function my_the_post_action( $post_object ) {

	ini_set('display_errors', true);
	error_reporting(E_ALL);
	global $the_terms_result;
die(var_dump($terms = wp_get_post_terms(190,WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES)));
	if(has_terms())
	{
	
		foreach($the_terms_result as $key=>$term)
		{	
			$att = array("base_cat_id"=>$term->term_id);
			
			$link = get_wpshop_category_link($att);
			$newpostarray = array(
						"post_type"=>"wpshop_product_category",
						"post_title"=>$term->name,
						"guid"=>$link,
						"ID"=>$term->term_id,
						'post_status'   => 'publish',
  						'post_author'   => 1,
						);
			$newpost = new mypost($newpostarray);

			$post_object = new WP_Post($newpost);

		}
	}
			
	return $post_object;
}
add_action( 'the_post', 'my_the_post_action' );**/


 	function catExists($slug){
 		$the_cat = get_term_by( 'slug', $slug,WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES );

 		return $the_cat;
 	}

	/******* SURCHARGE WPSHOP FUNCTIONS **********/
	/**
	* Traduit le shortcode et affiche une cat�gorie
	* @param array $atts : tableau de param�tre du shortcode
	* @return mixed
	**/
	function wpshop_category_func($atts) {
		global $wpdb;
		$string = '';
		if ( !empty($atts['cid']) ) {
			$atts['type'] = (!empty($atts['type']) && in_array($atts['type'],array('grid','list'))) ? $atts['type'] : 'grid';

			$cat_list = explode(',', $atts['cid']);

			if ( (count($cat_list) > 1) || ( !empty($atts['display']) && ($atts['display'] == 'only_cat') ) ) {
				$string .= '
					<div class="wpshop_categories_' . $atts['type'] . '" >';
					foreach( $cat_list as $cat_id ){
						$sub_category_def = get_term($cat_id, WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES);
						$string .= category_mini_output($sub_category_def, $atts['type']);
					}
				$string .= '
					</div>';
			}
			else {
				$sub_category_def = get_term($atts['cid'], WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES);

				if ( empty($atts['display']) || ($atts['display'] != 'only_products') ){
					$string .= category_mini_output($sub_category_def, $atts['type']);
					$string .= '
					<div class="category_product_' . $atts['type'] . '" >
						<h2 class="category_content_part_title" >'.__('Category\'s product list', 'wpshop').'</h2>';
				}

				$string .= wpshop_products::wpshop_products_func($atts);

				if ( empty($atts['display']) || ($atts['display'] != 'only_products') ){
					$string .= '</div>';
				}
			}
		}
		else {
			$string .= __('No categories found for display', 'wpshop');
		}

		return do_shortcode($string);
	}

	/**
	*	Display a category in a list
	*
	*	@param object $category The category definition
	*	@param string $output_type The output type defined from plugin option
	*
	*	@return mixed $content Output the category list
	*/
	function category_mini_output($category, $output_type = 'list'){
		$content = '';
		/*	Get the different informations for output	*/
		$category_meta_information = ( !empty($category) && !empty($category->term_id) ) ? get_option(WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES . '_' . $category->term_id) : '';
		$categoryThumbnail = '<img src="' .WPSHOP_DEFAULT_CATEGORY_PICTURE. '" alt="No picture" class="category_thumbnail" />';
		$image_url = WPSHOP_DEFAULT_CATEGORY_PICTURE; //LLA
		/*	Check if there is already a picture for the selected category	*/
		if ( !empty($category_meta_information['wpshop_category_picture']) ) {
			$image_post = wp_get_attachment_image( $category_meta_information['wpshop_category_picture'], 'thumbnail', false, array('class' => 'category_thumbnail') );
			$image_url = wp_get_attachment_image_url( $category_meta_information['wpshop_category_picture'], 'full', false);//LLA

			$categoryThumbnail = ( !empty($image_post) ) ? $image_post : '<img src="' .WPSHOP_DEFAULT_CATEGORY_PICTURE. '" alt="No picture" class="category_thumbnail" />';
			$image_url = ( !empty($image_url) ) ? $image_url : WPSHOP_DEFAULT_CATEGORY_PICTURE; //LLA
			
		}


		$category_title = ( !empty($category) && !empty($category->name) ) ? $category->name : '';
		$category_more_informations = ( !empty($category) && !empty($category->description) ) ? $category->description : '';
		$category_link = ( !empty($category) && !empty($category->term_id) ) ?  get_term_link((int)$category->term_id , WPSHOP_NEWTYPE_IDENTIFIER_CATEGORIES) : '';

		$item_width = null;
		/*	Make some treatment in case we are in grid mode	*/
		if($output_type == 'grid'){
			/*	Determine the width of a component in a line grid	*/
			$element_width = (100 / WPSHOP_DISPLAY_GRID_ELEMENT_NUMBER_PER_LINE);
			$item_width = (round($element_width) - 1) . '%';
		}

		/*
		 * Template parameters
		 */
		$template_part = 'category_mini_' . $output_type;
		$tpl_component = array();
		$tpl_component['CATEGORY_LINK'] = $category_link;
		$tpl_component['CATEGORY_THUMBNAIL'] = $categoryThumbnail;
		$tpl_component['CATEGORY_PICTURE'] =$image_url;//LLA
		$tpl_component['CATEGORY_TITLE'] = $category_title;
		$tpl_component['CATEGORY_DESCRIPTION'] = $category_more_informations;
		$tpl_component['ITEM_WIDTH'] = $item_width;
		$tpl_component['CATEGORY_ID'] = ( !empty($category) && !empty($category->term_id) ) ? $category->term_id : '';
		$tpl_component['CATEGORY_DISPLAY_TYPE'] = $output_type;

		/*
		 * Build template
		 */
		$tpl_way_to_take = wpshop_display::check_way_for_template($template_part);
		if ( $tpl_way_to_take[0] && !empty($tpl_way_to_take[1]) ) {
			/*	Include the old way template part	*/
			ob_start();
			require(wpshop_display::get_template_file($tpl_way_to_take[1]));
			$content = ob_get_contents();
			ob_end_clean();
		}
		else {
			$content = wpshop_display::display_template_element($template_part, $tpl_component);
		}
		unset($tpl_component);

		return $content;
	}

	/***************/


	add_filter('comments_open', 'wpc_comments_closed', 10, 2);

	add_shortcode('wpshop_get_categories', 'get_categories_helper_func');
	add_shortcode('get_login_container', 'get_login_container');
	add_shortcode('get_category_link', 'get_wpshop_category_link');
/************/
