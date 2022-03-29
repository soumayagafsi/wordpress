<section id="slider-section" class="slider-area home-slider">

	<link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">
  <!-- start of hero -->
          <div class="slider-shape"></div>

  <section class="hero-slider hero-style">
    <div class="swiper-container">

      <div class="swiper-wrapper">
        <?php for($p=1; $p<6; $p++) { ?>
        <?php if( get_theme_mod('slider'.$p,false)) { ?>
        <?php $querycolumns = new WP_query('page_id='.get_theme_mod('slider'.$p,true)); ?>
        <?php while( $querycolumns->have_posts() ) : $querycolumns->the_post(); 
          $image = wp_get_attachment_image_src(get_post_thumbnail_id() , true); ?>
        <?php 
          if(has_post_thumbnail()){
            $img = esc_url($image[0]);
          }
          if(empty($image)){
            $img = get_template_directory_uri().'/assets/images/default.png';
          }

        ?>

        <?php 
          $slider_icon1 = get_theme_mod('slider_icon1','fa fa-facebook');
          $slider_icon2 = get_theme_mod('slider_icon2','fa fa-instagram');
          $slider_icon3 = get_theme_mod('slider_icon3','fa fa-twitter');
          $slider_icon4 = get_theme_mod('slider_icon4','fa fa-linkedin');

        ?>


          <div class="swiper-slide">
            <div class="slide-inner slide-bg-image">
              <div class="col-md-12 sliderimg">
                <div class="col-md-6 col-sm-12">
                  <!-- <div class="slider-img-overlay-outer"></div>
                  <div class="slider-img-overlay"></div> -->
                    <div class="threebox box<?php echo esc_attr( $p ) ?> <?php if($p % 3 == 0) { echo "last_column"; } ?>">       
                      <img  src="<?php echo $img; ?>" alt="<?php the_title(); ?>">
                    </div>

                    <div class="slidericons">
                      <i class="<?php echo apply_filters('callcenter_slider', $slider_icon1); ?>" aria-hidden="true"></i>
                      <i class="<?php echo apply_filters('callcenter_slider', $slider_icon2); ?>" aria-hidden="true"></i>
                      <i class="<?php echo apply_filters('callcenter_slider', $slider_icon3); ?>" aria-hidden="true"></i>
                      <i class="<?php echo apply_filters('callcenter_slider', $slider_icon4); ?>" aria-hidden="true"></i>
                    </div>

                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="slider-inner-box">
                        <div data-swiper-parallax="300" class="slide-title">
                          <h2><?php the_title(); ?></h2>   
                        </div>    
                        <div data-swiper-parallax="400" class="slide-text">
                          <p><?php the_excerpt(); ?></p>
                        </div>
                        <div data-swiper-parallax="500" class="slide-btns">
                          <a class="ReadMore" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Read More','call-center'); ?></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
            </div>          
          </div>
      </div>
        <?php endwhile;
           wp_reset_postdata(); ?>
        <?php } } ?>
        <div class="clear"></div> 

      </div>
       <!-- swipper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
  </section>
  <!-- end of hero slider -->
</section>

