<?php
namespace JGibson\WordReplacer\Admin;

/**
  Defines core of admin menu functionality

  @since      0.1.0
  @package    word-replacer
  @subpackage word-replacer/admin
 */

/**
  Class that handles hooking up the admin menu functionality

  @since      0.1.0
  @package    word-replacer
  @subpackage word-replacer/admin
 */
class Admin {

	/**
	  Current plugin version

	  @since 0.1.0
	  @param string $version The plugin version
	 */
	protected $version;

	/**
	  The unique name of the plugin

	  @since 0.1.0
	  @param string $plugin_name The name of the plugin
	 */
	protected $plugin_name;


	/**
	  The options stored for the plugin

	  @since 0.1.0
	  @param array|mixed $options The options for the plugin
	 */
	protected $options;

	public function __construct( $plugin_name, $version ) {
		$this->version     = $version;
		$this->plugin_name = $plugin_name;
		$this->options     = \get_option( $this->plugin_name );
	}


	public function validate_options( $options ) {
		$valid = array();

		$valid['words'] = isset( $options['words'] ) && is_array( $options['words'] ) ? $this->check_words_array( $options['words'] ) : array();

		return $valid;
	}

	private function check_words_array( $maybe_words ) {
		$words = array();

		foreach ( $maybe_words as $key => $value ) {
			if ( ! is_numeric( $key ) && ! empty( $key ) ) {
				$words[ $key ] = (string) $value;
			}
		}

		return $words;
	}
	public function add_menu() {
		\add_options_page( 'Word Replacer Setup', 'Word Replacer', 'manage_options', $this->plugin_name, array( $this, 'setup_page' ) );
	}
	public function setup_page() {
		include_once 'partials/admin-display.php';
	}
	public function enqueue_admin_scripts() {
		if ( 'settings_page_' . $this->plugin_name == get_current_screen()->id ) {
			\wp_register_script( 'jg_wr_vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js' );
			\wp_enqueue_script( 'jg_wr_vue' );
			\wp_register_script( 'jg_wr_admin', \plugin_dir_url( __FILE__ ) . 'admin/js/admin.js', 'jg_wr_vue' );
			\wp_enqueue_script( 'jg_wr_admin' );
		}
	}

}
