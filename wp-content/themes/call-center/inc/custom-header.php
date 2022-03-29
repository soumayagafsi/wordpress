<?php
function callcenter_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'callcenter_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '646464',
		'width'                  => 2000, 
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'callcenter_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'callcenter_custom_header_setup' );

if ( ! function_exists( 'callcenter_header_style' ) ) :

function callcenter_header_style() {
		$header_text_color = get_header_textcolor();
		$topheader_logowidth = get_theme_mod('topheader_logowidth','100');
		$topheader_logoheight = get_theme_mod('topheader_logoheight','70');
	?>
	<style type="text/css">

		<?php 
		
		?>

		.custom-logo {
			width: <?php echo apply_filters('houdabusiness_topheader', $topheader_logowidth); ?>px;
			height: <?php echo apply_filters('houdabusiness_topheader', $topheader_logoheight); ?>px;
		}

		<?php  ?>
	<?php
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		else :
	?>
		h4.site-title{
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
