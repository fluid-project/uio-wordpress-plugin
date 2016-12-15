<?php
/*
Copyright 2015 OCAD University

Licensed under the Educational Community License (ECL), Version 2.0 or the New
BSD license. You may not use this file except in compliance with one these
Licenses.

You may obtain a copy of the ECL 2.0 License and BSD License at
https://github.com/fluid-project/infusion/raw/master/Infusion-LICENSE.txt
*/

add_action( 'admin_menu', 'add_plugin_page' );
add_action( 'admin_init', 'page_init' );

// Add the settings page to the dashboard menu
function add_plugin_page()
{
    add_options_page(
        'UIO Settings', 
        'User Interface Options',
        'manage_options',
        'uio-setting-admin',
        'create_admin_page'
    );
}

// Register the settings and define the form data
function page_init()
{
    register_setting( 'uio_option_group', 'uio_template_selector', 'sanitize_text_field' );
    register_setting( 'uio_option_group', 'uio_toc_selector',  'sanitize_text_field' );

    add_settings_section(
        'setting_section_id', // ID
        'Settings', // Title
        'print_section_info', // Callback
        'uio-setting-admin' // Page
    );

    add_settings_field(
        'uio_template_selector', // ID
        'Where should we put <em>UIO</em>?', // Title
        'uio_template_selector_callback', // Callback
        'uio-setting-admin', // Page
        'setting_section_id', // Section
        array( 'label_for' => 'uio_template_selector' )
    );

    add_settings_field(
        'uio_toc_selector', // ID
        'Where should we put the <em>Table of Contents</em>?', // Title
        'uio_toc_selector_callback', // Callback
        'uio-setting-admin',
        'setting_section_id',
        array( 'label_for' => 'uio_toc_selector' )
    );
}

// Display the template selector fields, with explanatory notes
function uio_template_selector_callback()
{
    printf(
        '<input type="text" id="uio_template_selector" name="uio_template_selector" value="%s" />',
        esc_attr( get_option('uio_template_selector'))
    );
    printf('<p class="description">A CSS selector specifying where in your pages you\'d like the UI Options templte to be.</p>');
    printf('<p class="description">IMPORTANT: Don\'t change this value unless you have a very good reason to do so.</p>');
}

// Display the table of contents selector fields, with explanatory notes
function uio_toc_selector_callback()
{
    printf(
        '<input type="text" id="uio_toc_selector" name="uio_toc_selector" value="%s" />',
          esc_attr( get_option('uio_toc_selector'))
    );
    printf('<p class="description">A CSS selector specifying where in your pages you\'d like the Table of Contents to appear.</p>');
}

function print_section_info()
{
    print '<p>The User Interface Options component needs to add some markup to the pages.
    You need to specify where, in your theme, this markup should go. The UIO HTML templates
    will be inserted as the first child of the elements identified by these CSS selectors.</p>';
}

// Build the settings page
function create_admin_page()
{
    // the "options.php" file below refers to the WordPress-included file, not this "admin-options.php" file
    ?>
    <div class="wrap">
        <h2>User Interface Options</h2>
        <form method="post" action="options.php">
        <?php
            // This prints out all hidden setting fields
            settings_fields( 'uio_option_group' );
            do_settings_sections( 'uio-setting-admin' );
            submit_button();
        ?>
        </form>
    </div>
    <?php
}

?>
