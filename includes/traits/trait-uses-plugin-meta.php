<?php
namespace JGibson\WordReplacer\Includes\Traits;

trait UsesPluginMeta {
	   /**
	  The current plugin version.

	  @since 0.1.0
	  @var   string  $version The version of the plugin.
		*/
	protected $version;

	/**
	  The identifier for the plugin

	  @since 0.1.0
	  @var   string  $plugin_name The unique identifier.
	 */
	protected $plugin_name;
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	public function get_version() {
		return $this->version;
	}
}
