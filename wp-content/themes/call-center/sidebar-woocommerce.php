<?php
/**
 * side bar template
 *
 * @package Call Center
 */
?>
<?php if ( ! is_active_sidebar( 'callcenter-woocommerce-sidebar' ) ) {	return; } ?>
<div class="col-lg-4 pl-lg-4 my-5 order-0">
	<div class="sidebar">
		<?php dynamic_sidebar('callcenter-woocommerce-sidebar'); ?>
	</div>
</div>