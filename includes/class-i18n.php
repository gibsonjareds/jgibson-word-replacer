<?php
namespace JGibson\WordReplacer\Includes;

/**
  File to define the internationalization class.

  The class handles internationalization.
 *
  @since      0.1.0
  @package    jg-word-replacer
  @subpackage jg-word-replacer/includes
 */

/**
  The class for handling internationalization.

  @since      0.1.0
  @package    jg-word-replacer
  @subpackage jg-word-replacer/includes
 */
class I18n {

	/**
	  Store the text domain.
	 *
	  @since  0.1.0
	  @var    string  $domain The current text domain
	 */
	protected $domain;

	public function load_plugin_textdomain() {
		\load_plugin_textdomain( $this->domain, false, \dirname( \dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
	}

	public function set_domain( $domain ) {
		$this->domain = $domain;
	}
}
