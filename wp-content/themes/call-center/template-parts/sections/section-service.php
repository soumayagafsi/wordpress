<section id="service-section" class="services-area home-services">
	<div class="container"> 
		<div class="row justify-content-center text-center">
			<div class="col-md-10 col-lg-8">
				<div class="header-section">
					<h2 class="title"><?php esc_html_e( 'Our Service', 'call-center' ); ?></h2>
					<!-- <p class="description"><?php esc_html_e( 'Sed at blandit ante. Vivamus feugiat lacus eusus cipit attis, tortor mi aliquam.', 'call-center' ); ?></p> -->					
				</div>
			</div>
		</div>
		<div class="row">

			<?php for($p=1; $p<7; $p++) { ?>
	        <?php if( get_theme_mod('Service'.$p,false)) { ?>
	        <?php $querycolumns = new WP_query('page_id='.get_theme_mod('Service'.$p,true)); ?>
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

				$color_service1 = get_theme_mod('color_service1','#4581c9');
				$color_service2 = get_theme_mod('color_service2','#6babf8');

			?>

			<!-- Start Single Service -->
			<div class="col-md-6 col-lg-4 box-space">


				<div class="threebox box<?php echo esc_attr( $p ) ?> <?php if($p % 3 == 0) { echo "last_column"; } ?>">       

				<div class="single-service">
					<div class="part-1">
						<div class="p1-img" style="background: linear-gradient(90deg, <?php echo apply_filters('callcenter_topheader', $color_service1); ?> 35%, <?php echo apply_filters('callcenter_topheader', $color_service2); ?> 100%)"></div>
						<div class="imageBox">
	                		<img  src="<?php echo $img; ?>" alt="<?php the_title(); ?>">	
	                	</div>		
	                	<div class="clearfix"></div>                					
					</div>
					<div class="part-2">
						<h3 class="title"><?php the_title(); ?></h3>
						 <p class="description"><?php the_excerpt(); ?></p>
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'call-center' ); ?></a> 
					</div>
					<!-- <div class="services-highlightborder" style="background: linear-gradient(90deg, <?php echo apply_filters('callcenter_topheader', $color_service1); ?> 35%, <?php echo apply_filters('callcenter_topheader', $color_service2); ?> 100%)"></div> -->
					<div class="clearfix"></div>
				</div>

              	</div>


			</div>
			<!-- / End Single Service -->

			<?php endwhile;
           wp_reset_postdata(); ?>
        <?php } } ?>
        <div class="clear"></div> 
			
		</div>
	</div>
</section>
<script>
	const progressElement = document.querySelector('.progress');
const handle = progressElement.querySelector('.handle');
let progressBounds = progressElement.getBoundingClientRect();

let progress = 60;

const drawProgress = () => {
	progressElement.style.setProperty('--progress', `${progress}%`);
	progressElement.setAttribute('aria-valuenow', progress);
	progressBounds = progressElement.getBoundingClientRect();
	const svg = progressElement.querySelector('svg') || document.createElementNS('http://www.w3.org/2000/svg', 'svg');
	const path = progressElement.querySelector('svg path') || document.createElementNS('http://www.w3.org/2000/svg', 'path');
	const animate = progressElement.querySelector('svg path animate') || document.createElementNS('http://www.w3.org/2000/svg', 'animate');
	
	const height = progressBounds.height * 3;
	const width = progressBounds.width * (progress/100);
	const offset = 4;
	
	svg.setAttribute('viewBox', `0 0 ${width} ${height}`);
	svg.setAttribute('width', width);
	path.setAttribute(
		'd',
		`M ${offset} ${height/2}
		${Array.from(Array(Math.ceil(width/height)).keys()).map(i =>
			`Q ${(i * height) + height/2 + offset} ${i % 2 === 0 ? 0 : height},
			${(i + 1) * height + offset} ${height/2}`
		).join(' ')}`
	);
	
	animate.setAttribute('attributeName', 'd');
	animate.setAttribute('dur', '1s');
	animate.setAttribute('repeatCount', 'indefinite');
	animate.setAttribute('values',
		`${/* Step 1 */''}
		M ${offset} ${offset}
		Q ${offset+.0001} ${offset}, ${offset+.0001} ${offset}
		Q ${offset} ${offset}, ${offset} ${offset}
		Q ${offset + height/2} ${height}, ${height + offset} ${height/2}
		${Array.from(Array(Math.ceil(width/height)).keys()).map(i =>
			`Q ${((i + 1) * height) + height/2 + offset} ${i % 2 === 0 ? 0 : height},
			${(i + 2) * height + offset} ${height/2}`
		).join(' ')};
		
		${/* Step 2 */''}
		M ${offset} ${height-offset}
		Q ${offset} ${height-offset}, ${offset} ${height-offset}
		Q ${offset + height/2} 0, ${height + offset} ${height/2}
		Q ${height + offset + height/2} ${height}, ${height*2 + offset} ${height/2}
		${Array.from(Array(Math.ceil(width/height)).keys()).map(i =>
			`Q ${((i + 2) * height) + height/2 + offset} ${i % 2 === 0 ? 0 : height},
			${(i + 3) * height + offset} ${height/2}`
		).join(' ')};
		
		${/* Step 3 */''}
		M ${offset} ${offset}
		Q ${offset + height/2} ${height}, ${height + offset} ${height/2}
		Q ${height + offset + height/2} 0, ${height*2 + offset} ${height/2}
		Q ${(height*2) + offset + height/2} ${height}, ${height*3 + offset} ${height/2}
		${Array.from(Array(Math.ceil(width/height)).keys()).map(i =>
			`Q ${((i + 3) * height) + height/2 + offset} ${i % 2 === 0 ? 0 : height},
			${(i + 4) * height + offset} ${height/2}`
		).join(' ')}`
	);
	
	if (!progressElement.querySelector('svg')) {
		path.appendChild(animate);
		svg.appendChild(path);
		progressElement.prepend(svg);
	}
};

window.addEventListener('resize', drawProgress, true);

const handleMouseMove = e => {
	e.preventDefault();
	let step = Math.round(((e.pageX - progressBounds.left) / progressBounds.width) * 100);
	if (step < 0) step = 0;
	if (step > 100) step = 100;
	progress = Math.abs(step);
	
	drawProgress();
};

handle.addEventListener('mousedown', () => {
	document.addEventListener('mousemove', handleMouseMove);

	document.addEventListener('mouseup', () => {
		document.removeEventListener('mousemove', handleMouseMove);
	}, { once: true });
});

drawProgress();
</script>