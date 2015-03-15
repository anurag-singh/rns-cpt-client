<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Rns_Cpt_Client
 * @subpackage Rns_Cpt_Client/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rns_Cpt_Client
 * @subpackage Rns_Cpt_Client/public
 * @author     Your Name <email@example.com>
 */
class Rns_Cpt_Client_Public {

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
	 * @param      string    $rns_cpt_client       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $rns_cpt_client, $version ) {

		$this->rns_cpt_client = $rns_cpt_client;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->rns_cpt_client, plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_script( $this->rns_cpt_client, plugin_dir_url( __FILE__ ) . 'js/rns-cpt-client-public.js', array( 'jquery' ), $this->version, false );

	}

}
