<?php
/**
 * Plugin Name: User Interface Options
 * Plugin URI: http://github.org/fluid-project/uio-wordpress-plugin
 * Description: Adds the Infusion User Interface Options component to the site
 * Version: 0.1
 * Author: Floe Project
 * Author URI: http://floeproject.org
 * License: New BSD license or the Educational Community License, Version 2.0
 */

/*
Copyright 2015 OCAD University

Licensed under the Educational Community License (ECL), Version 2.0 or the New
BSD license. You may not use this file except in compliance with one these
Licenses.

You may obtain a copy of the ECL 2.0 License and BSD License at
https://github.com/fluid-project/infusion/raw/master/Infusion-LICENSE.txt
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'UIO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'UIO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( UIO_PLUGIN_DIR . 'set-defaults.php' );

if ( is_admin() ) {
	require_once( UIO_PLUGIN_DIR . 'admin-options.php' );
} else {
	/**********************************************
	 * Add necessary files to headers
	 */
	function uio_styles_scripts() {
		/* Add the CSS files to the header */
		wp_enqueue_style( 'normalize', UIO_PLUGIN_URL . 'lib/infusion/src/lib/normalize/css/normalize.css' );
		wp_enqueue_style( 'fluid', UIO_PLUGIN_URL . 'lib/infusion/src/framework/core/css/fluid.css' );
		wp_enqueue_style( 'Enactors', UIO_PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/Enactors.css' );
		wp_enqueue_style( 'PrefsEditor', UIO_PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/PrefsEditor.css' );
		wp_enqueue_style( 'SeparatedPanelPrefsEditor', UIO_PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/SeparatedPanelPrefsEditor.css' );
	
		/* Add the JS files to the header */
		wp_enqueue_script( 'infusion', UIO_PLUGIN_URL . 'lib/infusion/infusion-uio.js');
		wp_enqueue_script( 'uio', UIO_PLUGIN_URL . 'uio.js');
	
		/* convey PHP data into the JavaScript */
		$php_data = array('pluginUrl' => UIO_PLUGIN_URL);
		$php_data['uioTemplateSelector'] = get_option('uio_template_selector');
		$php_data['uioTocSelector'] = get_option('uio_toc_selector');
		wp_localize_script( 'uio', 'phpData', $php_data );
	}
	add_action( 'wp_enqueue_scripts', 'uio_styles_scripts' );
}
