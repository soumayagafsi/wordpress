<?php
function callcenter_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'call-center'),
		) 
	);
	
	// Footer Background // 
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Footer Background','call-center'),
			'panel'  		=> 'footer_section',
			'priority'      => 1,
		)
    );
	
	// Background // 
	$wp_customize->add_setting(
		'footer_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'footer_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','call-center'),
			'section' => 'footer_background',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'footer_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/footer-bg.png'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'call-center'),
			'section'        => 'footer_background',
		) 
	));
	

	
	// Footer Bottom // 
	$wp_customize->add_section(
        'footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','call-center'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_text',
			'priority'  => 3,
		)
	);

	$wp_customize->add_control(
	'footer_btm_copy_head',
		array(
			'type' => 'hidden',
			'label' => __('Copyright','call-center'),
			'section' => 'footer_bottom',
		)
	);
	
	// Footer Copyright 
	$callcenter_foo_copy = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'call-center' );
	$wp_customize->add_setting(
    	'footer_copyright',
    	array(
			'default' => $callcenter_foo_copy,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'footer_copyright',
		array(
		    'label'   		=> __('Copytight','call-center'),
		    'section'		=> 'footer_bottom',
			'type' 			=> 'textarea',
			'transport'         => $selective_refresh,
		)  
	);		 
}
add_action( 'customize_register', 'callcenter_footer' );
// Footer selective refresh
function callcenter_footer_partials( $wp_customize ){	
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'callcenter_footer_copyright_render_callback',
	) );
	
	}
add_action( 'customize_register', 'callcenter_footer_partials' );


// copyright_content
function callcenter_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}