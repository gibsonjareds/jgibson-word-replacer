<?php
namespace JGibson\WordReplacer;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/gibsonjareds
 * @since             0.1.0
 * @package           jg-word-replacer
 *
 * @wordpress-plugin
 * Plugin Name:       Word Replacer
 * Plugin URI:        https://github.com/gibsonjareds/word-replacer
 * Description:       Replaces words in Posts, Pages, and Comments based on user-defined criteria.
 * Version:           0.1.0
 * Author:            Jared Gibson
 * Author URI:        https://github.com/gibsonjareds
 * License:           MIT
 * License URI:       https://mit-license.org
 * Text Domain:       jg-word-replacer
 * Domain Path:       /languages
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}

function wp_activate_word_replacer_plugin() {
	require_once \plugin_dir_path( __FILE__ ) . 'includes/class-activator';
	$activator = new Includes\Activator();
	$activator->activate();
}
\register_activation_hook( __FILE__, 'wp_activate_word_replacer_plugin' );

function wp_run_word_replacer_plugin() {
	require_once \plugin_dir_path( __FILE__ ) . 'includes/class-word-replacer.php';
	$plugin = new Includes\WordReplacer();

	$plugin->run();
}

wp_run_word_replacer_plugin();
