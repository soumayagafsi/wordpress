<?php  
	$callcenter_hs_blog 			= get_theme_mod('hs_blog','1');
	$callcenter_blog_title 		= get_theme_mod('blog_title');
	$callcenter_blog_subtitle		= get_theme_mod('blog_subtitle'); 
	$callcenter_blog_description	= get_theme_mod('blog_description');
	$callcenter_blog_num			= get_theme_mod('blog_display_num','3');
	if($callcenter_hs_blog=='1'):
?>

<section id="blog-section" class="blog-area home-blog">
	<div class="container">
		<?php if(!empty($callcenter_blog_title) || !empty($callcenter_blog_subtitle) || !empty($callcenter_blog_description)): ?>
			<div class="title">
				<?php if(!empty($callcenter_blog_title)): ?>
					<h6><?php echo wp_kses_post($callcenter_blog_title); ?></h6>
				<?php endif; ?>
				
				<?php if(!empty($callcenter_blog_subtitle)): ?>
					<h2><?php echo wp_kses_post($callcenter_blog_subtitle); ?></h2>
					<span class="shap"></span>
				<?php endif; ?>
				
				<?php if(!empty($callcenter_blog_description)): ?>
					<p><?php echo wp_kses_post($callcenter_blog_description); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?> 
		<div class="row">
			<?php 	
				$callcenter_blogs_args = array( 'post_type' => 'post', 'posts_per_page' => $callcenter_blog_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				$callcenter_blog_wp_query = new WP_Query($callcenter_blogs_args);
				if($callcenter_blog_wp_query)
				{	
				while($callcenter_blog_wp_query->have_posts()):$callcenter_blog_wp_query->the_post(); ?>
				<div class="col-lg-4 col-md-6">
					<?php get_template_part('/template-parts/content/content','page'); ?>
				</div>
			<?php 
				endwhile; 
				}
				wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<?php endif; ?>