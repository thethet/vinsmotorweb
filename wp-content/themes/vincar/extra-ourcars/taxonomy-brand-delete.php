<?php 
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
				<div class="col-md-9"  >
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
							<div class="col-md-4" id="audi">
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
						</div>	
						<?php endforeach;?>
				</div>				
				<div class="col-md-3">
					<h3>SEARCH</h3>
					
					<ul id="menu-project-menu" class="menu">
								<li id="menu-item-285" class="menu-item menu-item-type-taxonomy menu-item-object-project-type menu-item-285"><a href="#audi">audi</a></li>
								<li id="menu-item-284" class="menu-item menu-item-type-taxonomy menu-item-object-project-type menu-item-284"><a href="#hyundai">hyundai</a></li>
								<li id="menu-item-280" class="menu-item menu-item-type-taxonomy menu-item-object-project-type menu-item-280"><a href="#lexus">lexus</a></li>
								<li id="menu-item-281" class="menu-item menu-item-type-taxonomy menu-item-object-project-type menu-item-281"><a href="#mazda">mazda</a></li>
								<li id="menu-item-282" class="menu-item menu-item-type-taxonomy menu-item-object-project-type menu-item-282"><a href="#mitsubishi">mitsubishi</a></li>
								<li id="menu-item-283" class="menu-item menu-item-type-taxonomy menu-item-object-project-type menu-item-283"><a href="#nissan">nissan</a></li>
								<li id="menu-item-283" class="menu-item menu-item-type-taxonomy menu-item-object-project-type menu-item-283"><a href="#toyota">toyota</a></li>
							</ul>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>