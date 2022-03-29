<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>
<!-- Header Area -->

	<?php 
		$topheader_grdcol1 = get_theme_mod('topheader_grdcol1','#437fc7');
		$topheader_grdcol2 = get_theme_mod('topheader_grdcol2','#88b7f1');

		$stickyheader = esc_attr(callcenter_sticky_menu());
	?>

    <header class="main-header <?php echo esc_attr(callcenter_sticky_menu()); ?>" >

    	<!-- <div class="container"> -->
    		
		<?php if ( function_exists( 'peccular_companion_activated' ) ) { ?>
			<button class="top-header-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".top-header"><i class="fa fa-ellipsis-v"></i></button>
		<?php } ?>	

			<?php 

				$topheader_phn = get_theme_mod('topheader_phn','+386 40 111 5555');
				$topheader_phnicon = get_theme_mod('topheader_phnicon','fa fa-phone');

			?>
			
           <!-- Header -->
            <nav class="navbar navbar-expand-lg navbaroffcanvase">
            	<div class="row">
            		<div class="col-md-3 col-lg-3 col-sm-12 pd-0">
						<div class="logo " style="background: linear-gradient(100deg, <?php echo apply_filters('callcenter_topheader', $topheader_grdcol1); ?> 45%, <?php echo apply_filters('callcenter_topheader', $topheader_grdcol2); ?> 89%) ">
							<?php
							if(has_custom_logo())
								{	
									the_custom_logo();
								}
								else { 
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<h4 class="site-title">
										<?php 
											echo esc_html(bloginfo('name'));
										?>
									</h4>
								</a>	
							<?php 						
								}
							?>
							<?php
			$callcenter_site_desc = get_bloginfo( 'description');
			if ($callcenter_site_desc) : ?>
				<p class="site-description"><?php echo esc_html($callcenter_site_desc); ?></p>
		<?php endif; ?>
							
						</div>
					</div>

					<div class="col-md-7 col-lg-7 col-sm-12 Mnu-bar">
						<div class="navbar-menubar">
		                    <!-- Small Divice Menu-->
		                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','call-center'); ?>"> 
		                        <i class="fa fa-bars"></i>
		                    </button>
		                    <div class="collapse navbar-collapse navbar-menu">
			                    <button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','call-center'); ?>"> 
			                        <i class="fa fa-times"></i>
			                    </button> 
								<?php 
									wp_nav_menu( 
										array(  
											'theme_location' => 'primary_menu',
											'container'  => '',
											'container_id'    => '',
											'menu_class' => 'navbar-nav main-nav',
											'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
											'walker' => new WP_Bootstrap_Navwalker()
											 ) 
										);
								?>
		                    </div>
		                </div>
	                </div>

					<div class="col-md-2 col-lg-2 col-sm-12 padding-0 h-btn " style="background: linear-gradient(100deg, <?php echo apply_filters('callcenter_topheader', $topheader_grdcol1); ?> 45%, <?php echo apply_filters('callcenter_topheader', $topheader_grdcol2); ?> 89%) ">
	                    <!-- <div class="row"> -->
							<!-- <div class="col-md-2 col-lg-2 col-sm-2 col-space-icon"> -->
								
							<!-- </div> -->
							<div class="col-space-content">
								<a href="tel:<?php echo $topheader_phn;?>">
								<p class="callcenter-phone-label"><i class="<?php echo apply_filters('callcenter_topheader', $topheader_phnicon); ?>" ></i><?php echo apply_filters('callcenter_topheader', $topheader_phn); ?></p>
							</a>

							</div>
						<!-- </div> -->
	                </div>			

            	</div>
            </nav>
        <!-- </div> -->
    </header>