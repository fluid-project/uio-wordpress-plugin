<?php
add_action( 'admin_menu', 'add_plugin_page' );
add_action( 'admin_init', 'page_init' );

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

function page_init()
{        
  register_setting( 'uio_option_group', 'uio_template_selector' );
  register_setting( 'uio_option_group', 'uio_toc_selector' );

    add_settings_section(
        'setting_section_id', // ID
        'Settings', // Title
        'print_section_info', // Callback
        'uio-setting-admin' // Page
    );  

    add_settings_field(
        'uio_template_selector', // ID
        'Template selector', // Title 
        'uio_template_selector_callback', // Callback
        'uio-setting-admin', // Page
        'setting_section_id', // Section 
        array( 'label_for' => 'uio_template_selector' )          
    );      

    add_settings_field(
        'uio_toc_selector', // ID
        'Table of Contents selector', // Title 
        'uio_toc_selector_callback', // Callback
        'uio-setting-admin', 
        'setting_section_id',
        array( 'label_for' => 'uio_toc_selector' )          
    );      
}

function sanitize( $input )
{
    $new_input = array();
    if( isset( $input['uio_template_selector'] ) )
        $new_input['uio_template_selector'] = sanitize_text_field( $input['uio_template_selector'] );

    if( isset( $input['uio_toc_selector'] ) )
        $new_input['uio_toc_selector'] = sanitize_text_field( $input['uio_toc_selector'] );

    return $new_input;
}

function uio_template_selector_callback()
{
    printf(
        '<input type="text" id="uio_template_selector" name="uio_template_selector" value="%s" />',
        // isset( $this->options['uio_template_selector'] ) ? esc_attr( $this->options['uio_template_selector']) : 'is not set'
        /*isset( $this->options['uio_template_selector'] ) ?*/ esc_attr( get_option('uio_template_selector')) /*: 'is not set'*/
                );
	printf('<p class="description">A CSS selector specifying where in your pages you\'d like the UI Options templte to be.</p>');
	printf('<p class="description">IMPORTANT: Don\'t change this value unless you have a very good reason to do so.</p>');
}


function uio_toc_selector_callback()
{
    printf(
        '<input type="text" id="uio_toc_selector" name="uio_toc_selector" value="%s" />',
        /*isset( $this->options['uio_toc_selector'] ) ?*/ esc_attr( get_option('uio_toc_selector')) /*: ''*/
    );
	printf('<p class="description">A CSS selector specifying where in your pages you\'d like the Table of Contents to appear.</p>');
}


function print_section_info()
{
    print 'The User Interface Options component needs to add some markup to the pages. You need to specify where, in your theme, this markup should go.';
}


function create_admin_page()
{
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
