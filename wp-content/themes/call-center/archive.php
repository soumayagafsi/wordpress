<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Call Center
 */

get_header();
?>
<section class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row">
			<div class="<?php esc_attr(callcenter_post_layout()); ?>">
				<div class="row">
					<?php if( have_posts() ): ?>
					
						<?php while( have_posts() ) : the_post(); ?>
							<div class="col-lg-12">
								<?php get_template_part('template-parts/content/content','page'); ?>
							</div>
						<?php endwhile; ?>
						
					<?php else: ?>
					
						<?php get_template_part('template-parts/content/content','none'); ?>
						
					<?php endif; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>	
<?php get_footer(); ?>
