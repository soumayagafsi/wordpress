<?php
class callcenter_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof callcenter_import_dummy_data ) ) {
			self::$instance = new callcenter_import_dummy_data;
			self::$instance->callcenter_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function callcenter_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'callcenter_import_customize_scripts' ), 0 );

	}
	
	

	public function callcenter_import_customize_scripts() {

	wp_enqueue_script( 'callcenter-import-customizer-js', CALLCENTER_PARENT_INC_URI . '/customizer/customizer-notify/js/callcenter-import-customizer-options.js', array( 'customize-controls' ) );
	}
}

$callcenter_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
callcenter_import_dummy_data::init( apply_filters( 'callcenter_import_customizer', $callcenter_import_customizers ) );