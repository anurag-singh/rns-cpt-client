<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rns_Cpt_Client
 * @subpackage Rns_Cpt_Client/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rns_Cpt_Client
 * @subpackage Rns_Cpt_Client/admin
 * @author     Anurag Singh <contact@anuragsingh.me>
 */
class Rns_Cpt_Client_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rns_cpt_client    The ID of this plugin.
	 */
	private $rns_cpt_client;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $rns_cpt_client       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $rns_cpt_client, $version ) {

		$this->rns_cpt_client = $rns_cpt_client;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rns_Cpt_Client_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rns_Cpt_Client_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->rns_cpt_client, plugin_dir_url( __FILE__ ) . 'css/rns-cpt-client-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rns_Cpt_Client_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rns_Cpt_Client_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->rns_cpt_client, plugin_dir_url( __FILE__ ) . 'js/rns-cpt-client-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
   * Register custom post type 'client'
   *
   * @since    1.0.0
   */
	public function create_cpt_client() {
    register_post_type( 'client',
        array(
            'labels' => array(
                'name' => __( 'Clients', $this->rns_cpt_client ),
                'singular_name' => __( 'Client', $this->rns_cpt_client ),
                'menu_name' => __( 'Clients', $this->rns_cpt_client ),
                'name_admin_bar' => __( 'Clients', $this->rns_cpt_client ),
                'add_new' => __( 'Add New', $this->rns_cpt_client ),
                'add_new_item' => __( 'Add New Client', $this->rns_cpt_client ),
                'edit_item' => __( 'Edit Client', $this->rns_cpt_client ),
                'new_item' => __( 'New Client', $this->rns_cpt_client ),
                'view_item' => __( 'View Client', $this->rns_cpt_client ),
                'search_item' => __( 'Search Clients', $this->rns_cpt_client ),
                'not_found' => __( 'No products found', $this->rns_cpt_client ),
                'not_found_in_trash' => __( 'No products found in trash', $this->rns_cpt_client ),
                'all_items' => __( 'All Clients', $this->rns_cpt_client ),
            ),
            
            // Frontend
		        'has_archive'        => false,
		        'public'             => false,
		        'publicly_queryable' => false,
		         
		        // Admin
		        'capability_type' => 'post',
		        'menu_icon'     => 'dashicons-universal-access',
		        'menu_position' => 10,
		        'query_var'     => true,
		        'show_in_menu'  => true,
		        'show_ui'       => true,
		        'supports'    => array('thumbnail')
		        //'supports'        => false
		        //'supports'    => array( 'title', 'editor', 'custom-fields', 'thumbnail')
        )
    );
	}

	/**
	 * Add meta box for CPT 'client'
	 *
	 * @since    1.0.0
	 */
	public function create_meta_box_for_cpt_client() { 
    $screens =  array('client');

    foreach ($screens as $screen) {
      add_meta_box( 
        'meta_box_container', 
        __('Client Details', $this->rns_cpt_client ), 
        array( $this, 'render_metabox_data_for_cpt_client' ), 
        $screen, 
        'advanced', 
        'core' 
      );
    }
  }


	/**
	 * Save meta box data
	 *
	 * @since    1.0.0
	 *
	 * function called on save_post hook to sanitize and save the data
	 */ 
	public function render_metabox_data_for_cpt_client( $post ){
		wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $client_org_website = get_post_meta( $post->ID );
    $client_per_name = get_post_meta( $post->ID );
    $client_per_designation = get_post_meta( $post->ID );
    
    include_once( 'partials/rns-cpt-client-admin-display.php' );
	}

	/**
	 * Display meta box for CPT 'client'
	 *
	 * @since    1.0.0
	 */
	public function save_metabox_data_for_cpt_client( $post_id ) {
		// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    if( isset( $_POST[ 'website' ] ) ) {
        update_post_meta( $post_id, 'client_org_website', sanitize_text_field( $_POST[ 'website' ] ) );
    }

    if( isset( $_POST[ 'name' ] ) ) {
        update_post_meta( $post_id, 'client_person_name', sanitize_text_field( $_POST[ 'name' ] ) );
    }

    if( isset( $_POST[ 'per_desig' ] ) ) {
        update_post_meta( $post_id, 'client_person_designation', sanitize_text_field( $_POST[ 'per_desig' ] ) );
    }

 	}

}
