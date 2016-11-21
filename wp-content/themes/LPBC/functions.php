<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here
require_once('include/DMStoDD.php');
require_once('include/next_taxo.php');
require_once('include/short_description.php');
require_once('include/dompdf/autoload.inc.php');
add_theme_support('post-thumbnails');
add_action('init', 'create_custom_post_type');
add_action('init', 'create_custom_taxonomy');

function create_custom_post_type(){
    register_post_type('chateau',array(
        'labels'=>array(
            'name'=>__('Chateaux'),
            'all_items'=>('Tous les châteaux'),
            'singular_name'=>__('Chateau'),
            'add_new'=>('Ajouter un château')
        ),
        'public'=>true,
        'supports'=>array(
            'title','editor','thumbnail','comments'),
        'has_archive'=>true
    ));


    register_post_type('evenement',array(
        'labels'=>array(
            'name'=>__('Evenements'),
            'all_items'=>('Tous les événements'),
            'singular_name'=>__('Evenement'),
            'add_new'=>('Ajouter un événement')
        ),
        'public'=>true,
        'supports'=>array(
            'title','editor','thumbnail','comments'),
        'has_archive'=>true
    ));

    register_post_type('anecdotes',array(
        'labels'=>array(
            'name'=>__('Anecdotes'),
            'all_items'=>('Toutes les anecdotes'),
            'singular_name'=>__('Anecdote'),
            'add_new'=>('Ajouter une anecdote')
        ),
        'public'=>true,
        'supports'=>array(
            'title','editor','thumbnail','comments'),
        'has_archive'=>true
    ));

    register_post_type('monument-et-musee',array(
        'labels'=>array(
            'name'=>__('Monuments et musées'),
            'all_items'=>('Tous les monuments et musées'),
            'singular_name'=>__('Monument et musée'),
            'add_new'=>('Ajouter un musée ou monument')
        ),
        'public'=>true,
        'supports'=>array(
            'title','editor','thumbnail','comments'),
        'has_archive'=>true
    ));


    register_post_type('region',array(
        'labels'=>array(
            'name'=>__("Region"),
            'all_items'=>("Toutes les régions"),
            'singular_name'=>__("Région"),
            'add_new'=>("Ajouter une région")
        ),
        'public'=>true,
        'supports'=>array(
            'title','editor','thumbnail','comments'),
        'has_archive'=>true
    ));
}

register_post_type('blog',array(
    'labels'=>array(
        'name'=>__('Blogs'),
        'all_items'=>('Tous les blogs posts'),
        'singular_name'=>__('Blog'),
        'add_new'=>('Ajouter un blog post')
    ),
    'public'=>true,
    'supports'=>array(
        'title','editor','thumbnail','comments'),
    'has_archive'=>true
));
register_post_type('wishlist',array(
    'labels'=>array(
        'name'=>__('Wishlist'),
        'all_items'=>('Toutes les wishlists'),
        'singular_name'=>__('Wishlist'),
        'add_new'=>('Ajouter une wishlist')
    ),
    'public'=>true,
    'supports'=>array(
        'title','editor','thumbnail','comments'),
    'has_archive'=>true
));

/*
    register_post_type('point-interet',array(
        'labels'=>array(
            'name'=>__("Point d'interet"),
            'all_items'=>("Tous les points d'intérêts"),
            'singular_name'=>__("Point d'intérêt"),
            'add_new'=>("Ajouter un point d'intérêt")
        ),
        'public'=>true,
        'supports'=>array(
            'title','editor','thumbnail','comments'),
        'has_archive'=>true
    ));
*/

function create_custom_taxonomy(){
    register_taxonomy(
        'regions',
        array('chateau','monument-et-musee','region','evenement','blog'),
        array(
            'label'=>__('regions'),
            'hierarchical'=>true,
        ));

    register_taxonomy(
        'epoque',
        array('chateau','monument-et-musee'),
        array(
            'label'=>__('epoque'),
            'hierarchical'=>true,
        ));

    register_taxonomy(
        'style',
        array('chateau','monument-et-musee'),
        array(
            'label'=>__('style'),
            'hierarchical'=>true,
        ));

    register_taxonomy(
        'roi',
        array('chateau'),
        array(
            'label'=>__('roi'),
            'hierarchical'=>true,
        ));

    register_taxonomy(
        'tag',
        array('chateau','monument-et-musee','region','evenement','blog','wishlist','anecdotes'),
        array(
            'label'=>__('tag'),
            'hierarchical'=>true,
        ));
}


/*------------------------------------*\
	Theme Support
\*------------------------------------*/
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}



function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}





function add_js_scripts_signup() {
    wp_enqueue_script( 'script-signup', get_template_directory_uri().'/js/ajax-signup-script.js', array('jquery'));

    // pass Ajax Url to script.js
    wp_localize_script( 'script-signup', 'ajax_signup_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    add_action( 'wp_ajax_signup', 'signup' );
    add_action( 'wp_ajax_nopriv_signup', 'signup' );
}
add_action('init', 'add_js_scripts_signup');



function signup() {
    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = sanitize_user($_POST['username']);
    $info['user_pass'] = sanitize_text_field($_POST['password']);
    $info['user_email'] = sanitize_email( $_POST['email']);
    $info['remember'] = true;
    $mdp_conf = sanitize_text_field($_POST['password_conf']);

    if($mdp_conf === $info['user_pass']){
        if($info['user_login'] && $info['user_email']){
            $user_register = wp_insert_user( $info );
        }
    }
    if ( is_wp_error($user_register) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}





function add_js_scripts_fav() {
    wp_enqueue_script( 'fav-script', get_template_directory_uri().'/js/fav.js', array('jquery'));

    // pass Ajax Url to script.js
        wp_localize_script( 'fav-script', 'ajax_fav_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));

    add_action( 'wp_ajax_manage_fav', 'manage_fav' );
    add_action( 'wp_ajax_nopriv_manage_fav', 'manage_fav' );
}
add_action('init', 'add_js_scripts_fav');



function manage_fav() {

    if ( isset($_POST['postID']) && !empty($_POST['postID'])) {
        $current_post_id = $_POST['postID'];
        $current_user_id = get_current_user_id();

        // je test si la wishlist existe déja
        // si c'est le cas on enleve le tuple
        // si c'est pas le cas, c'est que il n'est pas déja dans la wishlist et on peut l'ajouter
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'wishlist',
            'meta_query'    => array(
                'relation'      => 'AND',
                array(
                    'key'       => 'fav_wishlist',
                    'value'     => false,
                    'compare'   => '='
                ),
                array(
                    'key'       => 'id_auteur',
                    'value'     => $current_user_id,
                    'compare'   => '='
                ),
                array(
                    'key'       => 'post_id',
                    'value'     => $current_post_id,
                    'compare'   => '='
                )
            )
        );

        $the_query = new WP_Query( $args );

        if( $the_query->have_posts() ) {
            while ($the_query->have_posts() ) : $the_query->the_post();
            $loop_post_id = get_the_ID();
            endwhile;
            $post_id = wp_delete_post( $loop_post_id, true );
            if($post_id){
                echo json_encode(array('status' => 'ok', 'action'=> 'Supprimer', 'message'=>__('le post id a bien été delete avec succés des favoris de l\'utilisateur')));
            } else {
            echo json_encode(array('status' => 'error', 'action'=> 'Supprimer', 'message'=>__('Une erreur est survenue lors de la suppression')));
            }
        } else {
        $numeroWishlist = 'fav_'.$current_user_id.'_'.$current_post_id;      
            $my_post = array(
                'post_title' => $numeroWishlist,
                'post_date' => date('Y-m-d H:i:s'),
                'post_status' => 'publish',
                'post_author' => get_current_user_id(),
                'post_type' => 'wishlist');
            $post_id = wp_insert_post($my_post);

            if($post_id){
                update_field('num_wishlist', $numeroWishlist, $post_id);
                update_field('post_id', $current_post_id, $post_id);
                update_field('id_auteur', $current_user_id, $post_id);
                update_field('fav_wishlist', false, $post_id);

                echo json_encode(array('status' => 'ok' ,'action'=> 'Ajouter', 'message'=>__('le post id a bien été ajouter avec succés dans les favoris de l\'utilisateur')));
            } else {
                echo json_encode(array('status' => 'error' ,'action'=> 'Ajouter', 'message'=>__('Une erreur est survenue lors de la sauvegarde')));
            }
        }
    } else {
        echo json_encode(array('status' => 'error' ,'action'=> 'manager_fav', 'message'=>__('post ID non défini')));
    }
    die();
}





function add_js_scripts_create_wishlist() {
    wp_enqueue_script( 'script-create-wishlist', get_template_directory_uri().'/js/create-wishlist.js', array('jquery'));

    // pass Ajax Url to script.js
        wp_localize_script( 'script-create-wishlist', 'ajax_create_wishlist_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));

    add_action( 'wp_ajax_create_wishlist', 'create_wishlist' );
    add_action( 'wp_ajax_nopriv_create_wishlist', 'create_wishlist' );
}
add_action('init', 'add_js_scripts_create_wishlist');


 
function create_wishlist() {
    $current_user_id = get_current_user_id();
    if ( isset($_POST['wishlist_name']) && !empty($_POST['wishlist_name'])) {
        $name = $_POST['wishlist_name'];
        if ( isset($_POST['postID']) && !empty($_POST['postID'])) {
            $current_post_id = $_POST['postID'];
            $numeroWishlist = 'wish_' . $current_user_id . '_' . $name . '_' . time();      
            $my_post = array(
                'post_title' => $numeroWishlist,
                'post_date' => date('Y-m-d H:i:s'),
                'post_status' => 'publish',
                'post_author' => get_current_user_id(),
                'post_type' => 'wishlist');
            $post_id = wp_insert_post($my_post);

            if($post_id){
                update_field('num_wishlist', $numeroWishlist, $post_id);
                update_field('nom_wishlist', $name, $post_id);
                update_field('post_id', $current_post_id, $post_id);
                update_field('id_auteur', $current_user_id, $post_id);
                update_field('fav_wishlist', true, $post_id);

                echo json_encode(array('status' => 'ok' ,'action'=> 'Ajouter', 'message'=>__('la wishlist a bien été crée')));
            } else {
                echo json_encode(array('status' => 'error' ,'action'=> 'Ajouter', 'message'=>__('Une erreur est survenue lors de la creation de la wishlist')));
            }
        } else {
            echo json_encode(array('status' => 'error' ,'action'=> 'Ajouter', 'message'=>__('Une erreur est survenue lors de la création de la wishlist - le post id n\'a pas été défini')));
        }
    } else {
            echo json_encode(array('status' => 'error' ,'action'=> 'Ajouter', 'message'=>__('Une erreur est survenue lors de la création de la wishlist - le nom de la wishlist n\'a pas été défini')));
    }
    die();
}





function add_js_scripts_add_wishlist() {
    wp_enqueue_script( 'script-add-wishlist', get_template_directory_uri().'/js/add-wishlist.js', array('jquery'));

    // pass Ajax Url to script.js
        wp_localize_script( 'script-add-wishlist', 'ajax_add_wishlist_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));

    add_action( 'wp_ajax_add_wishlist', 'add_wishlist' );
    add_action( 'wp_ajax_nopriv_add_wishlist', 'add_wishlist' );
}
add_action('init', 'add_js_scripts_add_wishlist');



function add_wishlist() {
    if(isset($_POST['wishlist_num']) && !empty($_POST['wishlist_num'])){
        if((isset($_POST['postID']) && !empty($_POST['postID'])) && (isset($_POST['name']) && !empty($_POST['name']))){
            $num = $_POST['wishlist_num'];
            $current_post_id = $_POST['postID'];
            $current_name = $_POST['name'];
            $current_user_id = get_current_user_id();

            $args = array(
                'numberposts'   => -1,
                'post_type'     => 'wishlist',
                'meta_query'    => array(
                    'relation'      => 'AND',
                    array(
                        'key'       => 'fav_wishlist',
                        'value'     => true,
                        'compare'   => '='
                    ),
                    array(
                        'key'       => 'id_auteur',
                        'value'     => $current_user_id,
                        'compare'   => '='
                    ),
                    array(
                        'key'       => 'num_wishlist',
                        'value'     => $num,
                        'compare'   => '='
                    ),
                    array(
                        'key'       => 'post_id',
                        'value'     => $current_post_id,
                        'compare'   => '='
                    )
                )
            );
            $the_query = new WP_Query( $args );
            if( $the_query->have_posts() ) {
                while ($the_query->have_posts() ) : $the_query->the_post();
                    $loop_post_id = get_the_ID();
                endwhile;
                $post_id = wp_delete_post( $loop_post_id, true );
                if($post_id){
                    echo json_encode(array('status' => 'ok', 'action'=> 'Supprimer', 'message'=>__('le post à bien été retiré de la wishlist')));
                } else {
                echo json_encode(array('status' => 'error', 'action'=> 'Supprimer', 'message'=>__('Une erreur est survenue lors de la suppression du post de la wishlist')));
                }
            } else {
                $my_post = array(
                    'post_title' => $num,
                    'post_date' => date('Y-m-d H:i:s'),
                    'post_status' => 'publish',
                    'post_author' => get_current_user_id(),
                    'post_type' => 'wishlist');
                $post_id = wp_insert_post($my_post);

                if($post_id){
                    update_field('num_wishlist', $num, $post_id);
                    update_field('post_id', $current_post_id, $post_id);
                    update_field('id_auteur', $current_user_id, $post_id);
                    update_field('nom_wishlist', $current_name, $post_id);
                    update_field('fav_wishlist', true, $post_id);

                    echo json_encode(array('status' => 'ok' ,'action'=> 'Ajouter', 'message'=>__('le post id a bien été ajouter avec succés dans la wishlist souhaité')));
                } else {
                    echo json_encode(array('status' => 'error' ,'action'=> 'Ajouter', 'message'=>__('Une erreur est survenue lors de la sauvegarde du post dans la wishlist')));
                }
            }
        } else {
            echo json_encode(array('status' => 'error' ,'action'=> 'add_wishlist', 'message'=>__('une erreur est survenue avec les données transmises(postID et name)')));
        }
    } else {
            echo json_encode(array('status' => 'error' ,'action'=> 'add_wishlist', 'message'=>__('une erreur est survenue avec les données transmises(wishlist_num)')));
    }
    die();
}





if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>
    <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
            <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
        <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
                'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
                'add_new' => __('Add New', 'html5blank'),
                'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
                'edit' => __('Edit', 'html5blank'),
                'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
                'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
                'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
                'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
                'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
                'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
                'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

?>
