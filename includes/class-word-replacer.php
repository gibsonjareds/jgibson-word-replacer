<?php
namespace JGibson\WordReplacer\Includes;

/**
  This file defines the main class.

  This class will handle running the plugin.
 *
  @since      0.1.0
  @package    jg-word-replacer
  @subpackage jg-word-replacer/includes
 */
require_once \plugin_dir_path( __FILE__ ) . 'traits/trait-uses-plugin-meta.php';
/**
  This is the core plugin class. It handles including all the code as well as setting up hooks.

  @since      0.1.0
  @package    jg-word-replacer
  @subpackage jg-word-replacer/includes
 */
class WordReplacer {
	use Traits\UsesPluginMeta;
	/**
	  The identifier for the plugin

	  @since 0.1.0
	  @var   string  $plugin_name The unique identifier.
	 */
	protected $plugin_name;

	/**
	  The loader to handle all the actions and filters

	  @since 0.1.0
	  @var   JGibson\WordReplacer\Includes\Loader $loader The loader for the actions and filters;
	 */
	protected $loader;

	public function __construct() {
		$this->plugin_name = 'jg-word-replacer';
		$this->version     = '0.1.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();

	}
	private function load_dependencies() {
		require_once \plugin_dir_path( \dirname( __FILE__ ) ) . 'includes/class-loader.php';
		require_once \plugin_dir_path( \dirname( __FILE__ ) ) . 'includes/class-i18n.php';
		require_once \plugin_dir_path( \dirname( __FILE__ ) ) . 'admin/class-admin.php';

		$this->loader = new Loader( $this->get_plugin_name(), $this->get_version() );

	}
	private function set_locale() {
		$i18N = new I18n();
		$i18N->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $i18N, 'load_plugin_textdomain' );
	}
	private function define_admin_hooks() {
		$admin = new \JGibson\WordReplacer\Admin\Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_scripts' );

		$this->loader->add_action( 'admin_init', $admin, 'options_update' );
		$this->loader->add_action( 'admin_menu', $admin, 'add_menu' );

		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $admin, 'add_action_links' );

	}
	public function run() {
		$this->loader->run();
	}

}
