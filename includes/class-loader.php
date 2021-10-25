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
	public function __construct() {
		$this->actions = array();
		$this->filters = array();
	}

	public function add_action( $hook, $object, $callback, $priority = 10, $num_args = 1 ) {
		$this->add(
			$this->actions,
			array(
				'hook'     => $hook,
				'object'   => $object,
				'callback' => $callback,
				'priority' => $priority,
				'num_args' => $num_args,
			)
		);
	}
	private function add( $which, $args ) {
		$which[] = $args;
	}
	public function add_filter( $hook, $object, $callback, $priority = 10, $num_args = 1 ) {
		$this->add(
			$this->filters,
			array(
				'hook'     => $hook,
				'object'   => $object,
				'callback' => $callback,
				'priority' => $priority,
				'num_args' => $num_args,

			)
		);
	}
	public function run() {
		foreach ( $this->filters as $hook ) {
			\add_filter( $hook['hook'], $hook['object'], $hook['callback'], $hook['priority'], $hook['num_args'] );
		}
		foreach ( $this->actions as $hook ) {
			\add_action( $hook['hook'], $hook['object'], $hook['callback'], $hook['priority'], $hook['num_args'] );
		}
	}
}
