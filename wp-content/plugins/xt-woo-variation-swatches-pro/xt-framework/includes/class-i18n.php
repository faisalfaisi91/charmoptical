<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    XT_Framework
 * @subpackage XT_Framework/includes
 * @author     XplodedThemes
 */
class XT_Framework_i18n {

	private $slug;
	private $file;

	public function __construct( $slug, $file ) {

		$this->slug = $slug;
		$this->file = $file;

		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			$this->slug,
			false,
			plugin_dir_path( $this->file ) . '/i18n/'
		);

	}

}
