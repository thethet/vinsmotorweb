<?php 
/* Template Name: ourcars*/
get_header();?>		
<script src="<?php echo get_template_directory_uri(); ?>/js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
</script>			
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
			
								$brand_types = get_terms(TAXONOMY_BRAND_TYPE,array('hide_empty' => false,'parent' => 0));
								
					
								foreach( $brand_types as $brand_type):
								
								/*var_dump($brand_type);
									$pros= get_terms(TAXONOMY_BRAND_TYPE, array('hide_empty' => false,'child_of' => $value->term_id));
									var_dump($pros);
									foreach( $pros as $pro ):
								*/
					?>
						<div >
						
						<?php
							// Start the Loop.
							 
		
							$args = array(
									//'posts_per_page'   => 5,
									'orderby'          => 'post_date',
									'order'            => 'ASC',
									'post_type'        => 'car',
									 'brand' => $brand_type->slug,
									'post_status'      => 'publish',								
								);
						
								$cars = get_posts( $args );								
								foreach( $cars as $car ):
									$img_id = get_post_thumbnail_id($car->ID, 'full');
									$imgurl = wp_get_attachment_url( $img_id );
									
									$current_term = wp_get_post_terms( $car->ID, 'brand');
							?>
							<a href="#" id="<?php echo $brand_type->slug;?>" ></a>
							<div class="col-md-4">
								<div class="car-data">
									<?php echo get_the_post_thumbnail($car->ID,'medium',array('class'=> "img-responsive"));?>
									<h4>
										<a href="<?php echo get_permalink( $car->ID );?>" alt="features" rel="features">
											<?php echo $car->post_title; ?>
											<?php echo $brand_type->slug;?>
										</a>
									</h4>
								</div>
							</div><?php endforeach;?>						
						</div><?php endforeach;?>
						
					</div>	
					<div class="col-md-3 tabs-style-bar">
							<h3>SEARCH</h3>	
						<nav>
							<?php 
			
								$brand_types = get_terms(TAXONOMY_BRAND_TYPE,array('hide_empty' => false,'parent' => 0));													
								foreach( $brand_types as $brand_type):		
							?>
								<li><a href="#<?php echo $brand_type->slug;?>"><?php echo $brand_type->slug;?></a></li>
								<?php			
								
								echo '</ul>';	
								endforeach;
							?>
						</nav>
					</div>
						
			</div>						
		</div>
</div>
<?php get_footer();?>