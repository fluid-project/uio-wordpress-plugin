<?php
/**
 * Copyright 2015–2019 OCAD University
 *
 * Licensed under the Educational Community License (ECL), Version 2.0 or the New
 * BSD license. You may not use this file except in compliance with one these
 * Licenses.
 *
 * You may obtain a copy of the ECL 2.0 License and BSD License at
 * https://github.com/fluid-project/infusion/raw/master/Infusion-LICENSE.txt
 *
 * @package User_Interface_Options
 */

/**
 * Add necessary files to headers
 */
function uio_styles_scripts() {
	/* Add the CSS files to the header */
	wp_enqueue_style( 'normalize', UIO_PLUGIN_URL . 'lib/infusion/src/lib/normalize/css/normalize.css', false, UIO_LIBRARY_VERSION );
	wp_enqueue_style( 'fluid', UIO_PLUGIN_URL . 'lib/infusion/src/framework/core/css/fluid.css', false, UIO_LIBRARY_VERSION );
	wp_enqueue_style( 'Enactors', UIO_PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/Enactors.css', false, UIO_LIBRARY_VERSION );
	wp_enqueue_style( 'PrefsEditor', UIO_PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/PrefsEditor.css', false, UIO_LIBRARY_VERSION );
	wp_enqueue_style( 'SeparatedPanelPrefsEditor', UIO_PLUGIN_URL . 'lib/infusion/src/framework/preferences/css/SeparatedPanelPrefsEditor.css', false, UIO_LIBRARY_VERSION );
	wp_enqueue_style( 'uio', UIO_PLUGIN_URL . 'uio.css', false, UIO_PLUGIN_VERSION );

	/* Add the JS files to the header */
	wp_enqueue_script( 'infusion', UIO_PLUGIN_URL . 'lib/infusion/infusion-uiOptions.js', false, UIO_LIBRARY_VERSION, false );
	wp_enqueue_script( 'uio', UIO_PLUGIN_URL . 'uio.js', array( 'jquery' ), UIO_PLUGIN_VERSION, false );

	/* Expose PHP data via JavaScript */
	$php_data = array(
		'pluginUrl'           => UIO_PLUGIN_URL,
		'uioTemplateSelector' => get_option( 'uio_template_selector', 'body' ),
		'uioTocSelector'      => get_option( 'uio_toc_selector', '#main' ),
	);
	wp_localize_script( 'uio', 'phpData', $php_data );
}

add_action( 'wp_enqueue_scripts', 'uio_styles_scripts' );
