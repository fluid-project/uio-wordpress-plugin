<?php
/**
 * Plugin Name: User Interface Options
 * Plugin URI: http://github.org/fluid-project/uio-wordpress-plugin
 * Description: Adds the Infusion User Interface Options component to the site
 * Version: 0.3
 * Author: Floe Project
 * Author URI: http://floeproject.org
 * License: New BSD license or the Educational Community License, Version 2.0
 */

/*
Copyright 2015-2016 OCAD University

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
    require_once( UIO_PLUGIN_DIR . 'inject-dependencies.php' );
}
