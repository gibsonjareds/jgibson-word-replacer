<?php
namespace JGibson\WordReplacer\Includes;

/**
  This file defines the main class.

  This class will handle running the plugin.
  @since      0.1.0
  @package    word-replacer
  @subpackage word-replacer/includes
 */

/**
  This is the core plugin class. It handles including all the code as well as setting up hooks.

  @since      0.1.0
  @package    word-replacer
  @subpackage word-replacer/includes 
 */
class WordReplacer {

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

    /**
      The loader to handle all the actions and filters

      @since 0.1.0
      @var   JGibson\WordReplacer\Includes\Loader $loader The loader for the actions and filters;
     */
    protected $loader;

    public function __construct(){
        $this->plugin_name = 'jg-word-replacer';
        $this->version = '0.1.0';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();

    }
    private function load_dependencies(){
        
    }
    private function set_locale(){
        
    }
    private function define_admin_hooks(){
        
    }
    public function run(){
        
    }

}
