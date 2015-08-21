<?php

require ZZIS_PLUGIN_DIR . "/lib/controlers/JSSOR_Settings.php";

if ( PROVERSION ) require_once ZZIS_PLUGIN_DIR . '/lib/pro/plugin-updates/plugin-update-checker.php';


class ZZIS {      
    
    static function init () {
        
        self::PRO_check_for_update();
                
        add_image_size( 'zzis_admin_thumb', 300, 300, true ); 
        add_image_size( 'zzis_admin_large', 500,9999 ); 
        
        add_action( 'plugins_loaded', array(__CLASS__, 'localize') );
        
        add_action( 'admin_enqueue_scripts', array( __CLASS__,  'load_admin_scripts_styles') );
        add_action( 'wp_enqueue_scripts', array( __CLASS__,  'load_user_scripts_styles') );
                
        add_shortcode( ZZIS_SHORTCODE, array( __CLASS__, 'process_shortcode') );
                
        if ( is_admin() ) {
                                   
            add_action('init', array( __CLASS__, 'register_post_type'), 1);
            add_action('add_meta_boxes', array( __CLASS__, 'add_all_meta_boxes'));
            add_action('admin_init', array( __CLASS__, 'add_all_meta_boxes'), 1);

            add_action('save_post', array( __CLASS__, 'add_image_meta_box_save'), 9, 1);
            add_action('save_post', array( __CLASS__, 'settings_meta_save'), 9, 1);

            add_action('wp_ajax_zzis_get_thumbnail', array( __CLASS__, 'ajax_zzis_get_thumbnail'));
        }
    }   
    

        
    static function activate () {
        // do nothing
    }    
       
    static function deactivate () {                
        // do nothing
    }
    
    static function PRO_check_for_update() {
        if ( PROVERSION ) {
            $MyUpdateChecker = new PluginUpdateChecker_2_1 (
                'http://zzapps.net/wp-content/uploads/zzis/zzis-PRO-info.json',
                ZZIS_PLUGIN_FILE,
                'zz-images-slider-PRO'
            );
        }
    }


    static function localize() {
        load_plugin_textdomain( ZZIS_TEXT_DOMAIN, false, ZZIS_PLUGIN_BASE_DIR . '/languages/' );
    }
        
    static function load_admin_scripts_styles( $hook ) {        
           
        global $post;

        if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
            if ($post->post_type === 'zzis_gallery') {     
                
                wp_enqueue_script('media-upload');
                wp_enqueue_script('zzis-uploader', ZZIS_PLUGIN_URL . 'js/zzis-uploader.js', array('jquery'));
                wp_enqueue_media();
                
                wp_enqueue_script('jquery-sumoselect', ZZIS_PLUGIN_URL . 'js/jquery.sumoselect.min.js', array('jquery'));
                wp_enqueue_style('jquery-sumoselect-css', ZZIS_PLUGIN_URL . 'css/sumoselect.css');
                wp_enqueue_script('zzis-multiselect', ZZIS_PLUGIN_URL . 'js/zzis-multiselect.js', array('jquery', 'jquery-sumoselect'));

                wp_enqueue_style('zzis-style', ZZIS_PLUGIN_URL . 'css/admin-style.css');

                $translation_array = array( 'delete' => __( 'Are you sure you want to delete this?', ZZIS_TEXT_DOMAIN ) );
                wp_localize_script( 'zzis-uploader', 'strings', $translation_array );
        
            }
        }        
        
    }
    
    static function load_user_scripts_styles() {                      
        
        wp_enqueue_script( 'jssor', ZZIS_PLUGIN_URL . 'js/jssor.slider.mini.js', array('jquery'), '', true);        
                
    }
    
    static function register_post_type() {
            $labels = array(
                    'name' => _x( 'ZZ Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'singular_name' => _x( 'ZZ Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'add_new' => _x( 'Add New Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'add_new_item' => _x( 'Add New Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'edit_item' => _x( 'Edit Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'new_item' => _x( 'New Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'view_item' => _x( 'View Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'search_items' => _x( 'Search Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'not_found' => _x( 'No Image Slider found', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'not_found_in_trash' => _x( 'No Image found in Trash', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'parent_item_colon' => _x( 'Parent Image:', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
                    'all_items' => __( 'All Image Sliders', ZZIS_TEXT_DOMAIN ),
                    'menu_name' => _x( 'ZZ Image Slider', 'zzis_gallery', ZZIS_TEXT_DOMAIN ),
            );

            $args = array(
                    'labels' => $labels,
                    'hierarchical' => false,
                    'supports' => array( 'title' ),
                    'public' => false,
                    'show_ui' => true,
                    'show_in_menu' => true,
                    'menu_position' => 10,
                    'menu_icon' => 'dashicons-images-alt2',
                    'show_in_nav_menus' => false,
                    'publicly_queryable' => false,
                    'exclude_from_search' => true,
                    'has_archive' => true,
                    'query_var' => true,
                    'can_export' => true,
                    'rewrite' => false,
                    'capability_type' => 'post'
            );

        register_post_type( 'zzis_gallery', $args );
        add_filter( 'manage_zzis_gallery_posts_columns', array( __CLASS__, 'zzis_gallery_columns' )) ;
        add_action( 'manage_zzis_gallery_posts_custom_column', array( __CLASS__, 'zzis_gallery_manage_columns' ), 10, 2 );
            
    }
    
    static function zzis_gallery_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'ZZ Image Slider Title', ZZIS_TEXT_DOMAIN ),
            'shortcode' => __( 'ZZ Image Slider Shortcode', ZZIS_TEXT_DOMAIN ),
            'phpcode' => __( 'ZZ Image Slider PHP code', ZZIS_TEXT_DOMAIN ),
            'date' => __( 'Date' )
        );
        return $columns;
    }

    static function zzis_gallery_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input type="text" value="[' . ZZIS_SHORTCODE . ' id=' . $post_id . ']" readonly="readonly" />';
            break;
          case 'phpcode' : 
              echo '<input type="text" value="<?= ZZIS(' . $post_id . ') ?>" readonly="readonly" />';
              break;
          default :
            break;
        }
    }    

    static function add_all_meta_boxes() {
        add_meta_box( __('Add Images', ZZIS_TEXT_DOMAIN), __('Add Images', ZZIS_TEXT_DOMAIN), array( __CLASS__, 'images_meta_box'), 'zzis_gallery', 'normal', 'low' );
        add_meta_box( __('Apply Setting On ZZ Image Slider', ZZIS_TEXT_DOMAIN), __('Apply Setting On ZZ Image Slider', ZZIS_TEXT_DOMAIN), array(__CLASS__, 'settings_meta_box'), 'zzis_gallery', 'normal', 'low');
        add_meta_box( __('Copy Image Slider Shortcode', ZZIS_TEXT_DOMAIN), __('Copy Image Slider Shortcode', ZZIS_TEXT_DOMAIN), array( __CLASS__, 'shortcode_meta_box'), 'zzis_gallery', 'side', 'low');
        add_meta_box( __('Ratings', ZZIS_TEXT_DOMAIN) , __('Ratings', ZZIS_TEXT_DOMAIN), array( __CLASS__, 'rate_us_meta_box'), 'zzis_gallery', 'side', 'low');                        

        if ( !PROVERSION ) {
            add_meta_box( __('Upgrade to PRO', ZZIS_TEXT_DOMAIN) , __('Upgrade to PRO', ZZIS_TEXT_DOMAIN), array( __CLASS__, 'upgrade_meta_box'), 'zzis_gallery', 'side', 'low');                        
        }            
    }        
    
    static function rate_us_meta_box() { 
        
        require ZZIS_PLUGIN_DIR . "/lib/views/backend/rate_us_meta_box.php"; 
        
    }
    
    static function upgrade_meta_box() { 
        
        require ZZIS_PLUGIN_DIR . "/lib/views/backend/upgrade_meta_box.php"; 
        
    }
        
    static function images_meta_box($post) {

        require ZZIS_PLUGIN_DIR . "/lib/views/backend/images_meta_box.php";  

    }
	
    static function settings_meta_box($post) { 
        
        $se = new JSSOR_Settings();
        $se->load( $post->ID );    
        
        require ZZIS_PLUGIN_DIR . "/lib/views/backend/settings_meta_box.php"; 
        
    }
	
    static function shortcode_meta_box() {
 
        require ZZIS_PLUGIN_DIR . "/lib/views/backend/shortcode_meta_box.php"; 

    }	

    static function admin_thumb_uris($id) {
        $url = wp_get_attachment_image_src($id, 'zzis_admin_original', true);
        
        if ( $url ) $url = $url[0];

        $name = "";
        $desc = "";
        $readmorelink = "";
        
        require ZZIS_PLUGIN_DIR . "/lib/views/backend/image_block.php";
    }

    static function ajax_zzis_get_thumbnail() {
        echo self::admin_thumb_uris($_POST['imageid']);
        die;
    }

    static function add_image_meta_box_save($post_id) {
        if (isset($post_id) && isset($_POST['zzis_image_url'])) {
            $total_images = count($_POST['zzis_image_url']);
            $images = array();
            if ($total_images) {
                for ($i = 0; $i < $total_images; $i++) {
                    $image_label = stripslashes($_POST['zzis_image_label'][$i]);
                    $image_desc = stripslashes($_POST['zzis_image_desc'][$i]);
                    $image_readmore_link = stripslashes($_POST['zzis_image_readmore_link'][$i]);
                    $image_readmore_link_type = stripslashes($_POST['zzis_image_readmore_link_type'][$i]);
                    $image_visible = stripslashes($_POST['zzis_image_visible'][$i]);
                    $url = $_POST['zzis_image_url'][$i];
                    $images[] = array(
                        'zzis_image_label' => $image_label,
                        'zzis_image_desc' => $image_desc,
                        'zzis_image_url' => $url,
                        'zzis_image_readmore_link' => $image_readmore_link,
                        'zzis_image_readmore_link_type' => $image_readmore_link_type,
                        'zzis_image_visible' => $image_visible,
                    );
                }
                update_post_meta($post_id, 'zzis_items_details', base64_encode(serialize($images)));
                update_post_meta($post_id, 'zzis_items_total_count', $total_images);
            } else {
                $total_images = 0;
                update_post_meta($post_id, 'zzis_items_total_count', $total_images);
                $images = array();
                update_post_meta($post_id, 'zzis_items_details', base64_encode(serialize($images)));
            }
        }
    }

    static function settings_meta_save($post_id) {
        
        if (isset($post_id) && isset($_POST['zzis_settings_action']) == "zzis-settings-save-settings") {                                           
            
            $se = new JSSOR_Settings();           
            $se->save( $post_id ); 
                        
        }
        
    }

    static function process_shortcode( $atts, $content = null ) {

        ob_start();

        if (isset($atts['id'])) {
                      
            $se = new JSSOR_Settings();            
            $se->load( $atts['id'] );                                                                        
            $se->get_html( $atts['id'] );
            
        }        
                                                 
        wp_reset_query();                                

        return ob_get_clean();
    }
    
}




