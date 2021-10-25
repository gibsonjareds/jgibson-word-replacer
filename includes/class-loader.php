<?php
namespace JGibson\WordReplacer\Includes;

/**
  Loads all the actions and filters.

  @since      0.1.0
  @package    word-replacer
  @subpackage word-replacer/includes
 */

/**
  Loads all the actions and filters.

  @since      0.1.0
  @package    word-replacer
  @subpackage word-replacer/includes
 */
class Loader {

    /**
      Array of actions loaded by the plugin.

      @since 0.1.0
      @var   array $actions The array of actions.
     */
    protected $actions;

    /**
      Array of filters loaded by the plugin.

      @since 0.1.0
      @var   array $filters The array of filters.
     */
    protected $filters;

    /**
      Set up the arrays for loading in actions or filters.

      @since 0.1.0
     */
    public function __construct(){
        $this->actions = array();
        $this->filters = array();
    }
}
