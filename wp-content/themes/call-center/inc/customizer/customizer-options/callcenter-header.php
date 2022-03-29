<?php
function callcenter_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'call-center'),
		) 
	);

	
	/*=========================================
	Call Center Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','call-center'),
			'panel'  		=> 'header_section',
		)
    );


	// topheader Logo Width
	$topheaderlogowidth = esc_html__('100', 'call-center' );
	$wp_customize->add_setting(
    	'topheader_logowidth',
    	array(
			'default' => $topheaderlogowidth,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'topheader_logowidth',
		array(
		    'label'   		=> __('Logo Width','call-center'),
		    'section'		=> 'title_tagline',
			'type' 			=> 'range',
			'transport'         => $selective_refresh,
		)  
	);	

	// topheader Logo Height
	$topheaderlogoheight = esc_html__('70', 'call-center' );
	$wp_customize->add_setting(
    	'topheader_logoheight',
    	array(
			'default' => $topheaderlogoheight,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'topheader_logoheight',
		array(
		    'label'   		=> __('Logo Height','call-center'),
		    'section'		=> 'title_tagline',
			'type' 			=> 'range',
			'transport'         => $selective_refresh,
		)  
	);	


	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'hdr_navigation',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Navigation','call-center'),
			'panel'  		=> 'header_section',
		)
    );

    // Cart
	$wp_customize->add_setting(
		'hdr_nav_cart'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_cart',
		array(
			'type' => 'hidden',
			'label' => __('Cart','call-center'),
			'section' => 'hdr_navigation',
			'priority' => 2,
		)
	);

	// hide/show
	$wp_customize->add_setting( 
		'hide_show_cart' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cart', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'call-center' ),
			'section'     => 'hdr_navigation',
			'type'        => 'checkbox',
			'priority' => 2,
		) 
	);
	
	// Header Search
	$wp_customize->add_setting(
		'hdr_nav_search_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_search_head',
		array(
			'type' => 'hidden',
			'label' => __('Search','call-center'),
			'section' => 'hdr_navigation',
			'priority'  => 3,
		)
	);	
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_nav_search' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hs_nav_search', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'call-center' ),
			'section'     => 'hdr_navigation',
			'type'        => 'checkbox',
			'priority' => 3,
		) 
	);
	
	
	// Header Toggle
	$wp_customize->add_setting(
		'hdr_nav_toggle_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_nav_toggle_head',
		array(
			'type' => 'hidden',
			'label' => __('Toggle','call-center'),
			'section' => 'hdr_navigation',
			'priority'  => 6,
		)
	);	
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_nav_toggle' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_checkbox',
		) 
	);
	
	$wp_customize->add_control(
	'hs_nav_toggle', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'call-center' ),
			'section'     => 'hdr_navigation',
			'type'        => 'checkbox',
			'priority' => 7,
		) 
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'callcenter_hdr_toggle_ttl',
    	array(
			'sanitize_callback' => 'callcenter_sanitize_html',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'callcenter_hdr_toggle_ttl',
		array(
		    'label'   		=> __('Title','call-center'),
		    'section' 		=> 'hdr_navigation',
			'type'		 =>	'text',
			'priority' => 8,
		)  
	);	
	
	
	// content // 
	$wp_customize->add_setting(
    	'callcenter_hdr_toggle_content',
    	array(
			'sanitize_callback' => 'callcenter_sanitize_html',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'callcenter_hdr_toggle_content',
		array(
		    'label'   		=> __('Title','call-center'),
		    'section' 		=> 'hdr_navigation',
			'type'		 =>	'textarea',
			'priority' => 8,
		)  
	);	
	
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','call-center'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','call-center'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'callcenter_sanitize_checkbox',
			'priority' => 2,
		) 
	);

	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'call-center' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);		


	// // topheader Button Color
	// $topheaderstickycolor = esc_html__('#509e39', 'call-center' );
	// $wp_customize->add_setting(
 //    	'topheader_stickycolor',
 //    	array(
	// 		'default' => $topheaderstickycolor,
	// 		'capability'     	=> 'edit_theme_options',
	// 		'sanitize_callback' => 'wp_kses_post',
	// 		'priority'      => 2,
	// 	)
	// );	

	// $wp_customize->add_control( 
	// 	'topheader_stickycolor',
	// 	array(
	// 	    'label'   		=> __('Header Color','call-center'),
	// 	    'section'		=> 'sticky_header_set',
	// 		'type' 			=> 'color',
	// 		'transport'         => $selective_refresh,
	// 	)  
	// );	
	


	/*=========================================
	Call Center header
	=========================================*/
	$wp_customize->add_section(
        'top_header',
        array(
        	'priority'      => 5,
            'title' 		=> __('Header','call-center'),
			'panel'  		=> 'header_section',
		)
    );	

	

	
	// topheader Phone Number
	$topheaderphn = esc_html__('+386 40 111 5555', 'call-center' );
	$wp_customize->add_setting(
    	'topheader_phn',
    	array(
			'default' => $topheaderphn,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'topheader_phn',
		array(
		    'label'   		=> __('Phone Number','call-center'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);		


	// topheader phone number icon
	$topheaderphnicon = esc_html__('fa fa-phone', 'call-center' );
	$wp_customize->add_setting(
    	'topheader_phnicon',
    	array(
			'default' => $topheaderphnicon,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'topheader_phnicon',
		array(
		    'label'   		=> __('Phone Number Icon','call-center'),
		    'section'		=> 'top_header',
			'type' 			=> 'icon',
			'transport'         => $selective_refresh,
		)  
	);	


	// topheader gradient color 1
	$topheadergrdcol1 = esc_html__('#437fc7', 'call-center' );
	$wp_customize->add_setting(
    	'topheader_grdcol1',
    	array(
			'default' => $topheadergrdcol1,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'topheader_grdcol1',
		array(
		    'label'   		=> __('Header Color 1','call-center'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);	

	// topheader gradient color 2
	$topheadergrdcol2 = esc_html__('#88b7f1', 'call-center' );
	$wp_customize->add_setting(
    	'topheader_grdcol2',
    	array(
			'default' => $topheadergrdcol2,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 7,
		)
	);	

	$wp_customize->add_control( 
		'topheader_grdcol2',
		array(
		    'label'   		=> __('Header Color 2','call-center'),
		    'section'		=> 'top_header',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);		



}
add_action( 'customize_register', 'callcenter_header_settings' );





