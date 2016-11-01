<?php 
/* Template Name: ourservices*/
get_header();?>				
<div class="section ourservices">		
		<div class="container small-container">
			<div class="row">				
				<h2 class="title-bg">Our Services</h2>				
			</div>
		</div>	
	<div class="container medium-container">
		<div class="row">
			<div class="col-md-3" style=""><!--  Start Nav tabs -->
				<nav id="myTabs">
				  <ul  class="nav nav-tabs" role="tablist">
				    <?php
						$args = array(
							//'posts_per_page'   => 5,
							'meta_key' => 'priority',
							'orderby'          => 'meta_value_num',
							'order'            => 'ASC',
							'post_type'        => 'services',
							'post_status'      => 'publish',								
						);				
						$servicedata = get_posts( $args );	
					?>
					<?php foreach($servicedata as $service): ?>
					<?php 
						$string = $service->post_title;
						$string = str_replace(' ', '', $string); 
					?>
						<li role="presentation">
							<a href="#<?php echo $string; ?>" data-toggle="tab">
								<img src="<?php echo get_template_directory_uri(); ?>/images/service-icon.png" alt="<?php echo $service->post_title; ?>">
								<span><?php echo $service->post_title; ?></span>	
							</a>
						</li>

					 <?php endforeach; ?>
					</ul>
				</nav>
			</div> <!--  End Nav tabs -->  			
			<!--  Start Tab panes -->
			<div class="tab-content col-md-9" id="MyButton">			
					<?php
					// Start the Loop.							 		
					$args = array(
							//'posts_per_page'   => 5,
							'orderby'          => 'post_date',
							'order'            => 'DESC',
							'post_type'        => 'services',
							'post_status'      => 'publish',								
						);				
						$services = get_posts( $args );								
						foreach( $services as $service ):
						$string =$service->post_title;
						$string = str_replace(' ', '', $string);
					?>
							<div role="tabpanel" class="tab-pane" id="<?php echo $string; ?>">
									<h4 class="service-title">
										<a href="<?php echo get_permalink( $service->ID );?>" alt="features" rel="features">
											<?php echo $service->post_title; ?>											
										</a>
									</h4>
								<div class="">
									<?php echo get_the_post_thumbnail($service->ID,'medium',array('class'=> "img-responsive service-img"));?>								
									<p><?php echo $service->post_content; ?>		</p>
								</div>
							</div><?php endforeach;?>
			</div>	<!--  End Tab panes -->								
		</div>
	</div>	
</div>
<?php get_footer();?>