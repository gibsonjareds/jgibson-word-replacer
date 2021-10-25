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


	public static function validate_options( $options ) {

	}


}
