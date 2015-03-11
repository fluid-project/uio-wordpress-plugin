<?php
/**
 * Plugin Name: User Interface Options
 * Plugin URI: http://floeproject.org
 * Description: Adds the Infusion User Interface Options component to the site
 * Version: 0.1
 * Author: Floe Project
 * Author URI: http://floeproject.org
 * License: New BSD license or the Educational Community License, Version 2.0
 */
 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'UIO__PLUGIN_URL', plugin_dir_url( __FILE__ ) );

function uio_styles_scripts() {
	/* Add the CSS files to the header */
	wp_enqueue_style( 'normalize', UIO__PLUGIN_URL . 'lib/infusion/src/lib/normalize/css/normalize.css' );
	wp_enqueue_style( 'fluid', UIO__PLUGIN_URL . 'lib/infusion/src/framework/core/css/fluid.css' );
	wp_enqueue_style( 'Enactors', UIO__PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/Enactors.css' );
	wp_enqueue_style( 'PrefsEditor', UIO__PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/PrefsEditor.css' );
	wp_enqueue_style( 'SeparatedPanelPrefsEditor', UIO__PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/SeparatedPanelPrefsEditor.css' );

	/* Add the JS files to the header */
	wp_enqueue_script( 'infusion', UIO__PLUGIN_URL . 'lib/infusion/infusion-uio.js');
	wp_enqueue_script( 'uio', UIO__PLUGIN_URL . 'uio.js');

	/* convey file locations to the javascript */
	$php_file_locations = array('pluginUrl' => UIO__PLUGIN_URL);
	wp_localize_script( 'uio', 'phpFileLocations', $php_file_locations );
}
add_action( 'wp_enqueue_scripts', 'uio_styles_scripts' );

