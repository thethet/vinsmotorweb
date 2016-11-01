<?php 
/* Template Name: ourcars*/
get_header();?>					
<div class="section cars">		
	<?php    

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		query_posts(array(
			'orderby'	  => 'post_date',
			'order'		  => 'ASC',
			'post_type'      => 'car', // You can add a custom post type if you like
			'paged'          => $paged,
			'numberposts' => -1 ,
			'posts_per_page' => 6
		));

		if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
						<?php echo $post->ID;?>
				<?php endwhile; ?>
				
			<?php my_pagination(); ?>
		<?php endif; ?>
</div>
<?php get_footer();?><?php 
/* Template Name: ourcars*/
get_header();?>					
<div class="section cars">		
		<div class="container">
			<div class="row">				
				<h1 class="title">Our Cars</h1>				
			</div>
		</div>
		<div class="container">			
			<div class="row car">							
					<div class="col-md-9" >							
						<?php
							// Start the Loop.
							 
		
							$args = array(
									'posts_per_page'   => 555,
									'orderby'          => 'post_date',
									'order'            => 'ASC',
									'post_type'        => 'car',
									'post_status'      => 'publish',								
								);
						
								$cars = get_posts( $args );								
								foreach( $cars as $car ):
							?>
							<div class="col-md-4">
								<div class="car-data">
									<?php echo get_the_post_thumbnail($car->ID,'medium',array('class'=> "img-responsive"));?>
									<h4>
										<a href="<?php echo get_permalink( $car->ID );?>" alt="features" rel="features">
											<?php echo $car->post_title; ?>
										</a>
									</h4>
								</div>
							</div>				
						<?php endforeach;?>		
					</div>	
					<div class="col-md-3">
							<h3>SEARCH</h3>				
							<?php if ( has_nav_menu( 'sub_menu', 'mytheme' ) ) { ?>
									<?php 
											wp_nav_menu( array( 
												'container' => false, 
												'menu_class' => 'submenu', 
												'theme_location' => 'sub_menu', 
												'fallback_cb' => 'display_home' 
												) ); 
									?>
							<?php } else { ?>
						<ul class="">					
								<?php wp_list_pages('title_li=' ); ?>
						</ul>
						<?php	} ?>
					</div>	
			</div>						
		</div>
</div>
<?php get_footer();?>