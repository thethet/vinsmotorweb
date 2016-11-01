<?php 
/* Template Name: ourcars-chinese*/
get_header();?>				
<div class="section cars">		
		<div class="container medium-container">
			<div class="row">	
				<div class="col-md-12">
					<h2 class="title-bg">Our Cars</h2>
				</div>	
			</div>
		</div>	
	<div class="container medium-container">
		<div class="row">
		<?php
		global $wpdb;
		$query = sprintf("SELECT meta_value FROM vc_postmeta
								WHERE post_id=75 
								AND meta_key = 'field_5747da1e5ed83'");						
		$grades = $wpdb->get_results($query);
		$grades = array_shift($grades);
		foreach($grades as $key=>$value):
				$value = unserialize($value);
				$selgrades = $value['choices'];
			endforeach;
		?>
			<div class="col-xs-12 col-sm-3 col-md-3 searchsection" style="float:right;"><!--  Start Nav tabs -->
				<div class="search"><h4 class="search-title">search</h4></div>
					<select id="pagiselector" onchange="changeGrade('<?php echo site_url()."/?page_id=254&searchid="; ?>')">
						<option value="default">Select Per Page</option>
						<option value="3">3 cars per page</option>
						<option value="6">6 cars per page</option>
						<option value="9">9 cars per page</option>
						<option value="12">12 cars per page</option>
						<option value="500">All</option>
					</select>
					<select id="gradeselector" onchange="changeGrade('<?php echo site_url()."/?page_id=254&searchid="; ?>')">
						<option selected value="default">Select Grade</option>
						<?php foreach($selgrades as $value): ?>
							<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
					</select>
					<nav>				
						  <ul  class="nav nav-tabs" role="tablist" id="show">
						  <h4 class="brands-title">brands</h4>
							<?php  
								$brand_types = get_terms(TAXONOMY_BRAND_TYPE,array('hide_empty' => false,'parent' => 0));
								foreach( $brand_types as $brand_type):	?>	
								<li><img src="<?php echo get_template_directory_uri(); ?>/images/list-icon.png" alt="<?php echo $brand_type->slug;?>"><a href="javascript:void(0)" data-link="<?php echo site_url()."/?page_id=254&branch="; ?>" data-type="<?php echo $brand_type->slug;?>"><span><?php echo $brand_type->slug;?></span></a></li>
								
							 <?php endforeach; ?>
							 	 <li><img src="<?php echo get_template_directory_uri(); ?>/images/list-icon.png"><a href="javascript:void(0)" data-link="<?php echo site_url()."/?page_id=254&branch="; ?>" data-type="default"><span>Default</span></a></li>
							</ul>
					</nav>
				
			</div> <!--  End Nav tabs --> 
			<div class="col-xs-12 col-sm-9 col-md-9" id="specificDiv">
			
					<?php 	
					
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						query_posts(array(
							'orderby'	  => 'post_date',
							'order'		  => 'ASC',
							'post_type'      => 'car',
							/*'brand' => $brand_type->slug,*/
							'paged'          => $paged,
							/*'numberposts' => -1 ,*/
							'posts_per_page' => 6
						));
				if ( have_posts() ) { ?>
						<div class="row">				
								<?php while ( have_posts() ) : the_post();	?>			
								<div class="col-xs-12 col-sm-6 col-md-4">
									<div class="car-data">
										<a href="<?php echo get_permalink( $post->ID );?>" alt="features" rel="features">
										<?php echo get_the_post_thumbnail($post->ID,'medium',array('class'=> "img-responsive"));?>
										<h4>	
										<?php	$query = sprintf("SELECT vt.name  FROM vc_term_taxonomy AS vtt
												INNER JOIN
												vc_terms AS vt ON vtt.`term_id` =vt.`term_id`
												INNER JOIN 
												vc_term_relationships AS vtr ON vtt.`term_id`=vtr.`term_taxonomy_id`
												WHERE vtr.`object_id`=%d AND vtt.`taxonomy`='brand'",$post->ID);
										$data = $wpdb->get_results($query);
										$data = array_shift($data); ?>
											<span class="titlecat"><?php echo $data->name; ?></span>
											<?php echo the_title(''); ?>
										</h4>
										</a>
									</div>
								</div>						
								<?php endwhile; ?>							
						</div>
					<?php if( $wp_query->max_num_pages > '1' ) { ?>
					<div class="col-xs-12 col-md-4 col-md-offset-4" id="pagination">	 
					<?php my_pagination(); ?>
					</div>
					<?php } ?>					
					<?php } ?>
			</div>	
			 			
			<!--  Start Tab panes -->
			<div class="tab-content col-md-9">			
			<?php 			
					$brand_types = get_terms(TAXONOMY_BRAND_TYPE,array('hide_empty' => false,'parent' => 0));													
					foreach( $brand_types as $brand_type):
			?>									

								<div role="tabpanel" class="tab-pane" id="<?php echo $brand_type->slug;?>">
								<?php
							// Start the Loop.							 		
								$args = array(
									'posts_per_page'   => 6,
									'orderby'          => 'post_date',
									'order'            => 'ASC',
									'post_type'        => 'car',
									 'brand' => $brand_type->slug,
									'post_status'      => 'publish',								
								);
						
								$cars = get_posts( $args );								
								foreach( $cars as $car ):
							?>
							<?php if($car) {?>
							<div class="col-sm-6 col-md-4 car-data">
								
									<?php echo get_the_post_thumbnail($car->ID,'medium',array('class'=> "img-responsive"));?>
									<h4>
										<a href="<?php echo get_permalink( $car->ID );?>" alt="features" rel="features">											
											<span class="titlecat"><?php echo $brand_type->slug;?></span>
											<?php echo $car->post_title; ?>
										</a>
									</h4>
							</div>
							<?php }	
								else { echo"No Data";}
							?>
								<?php endforeach; ?>
								
								</div>							
			<?php endforeach; ?>
			</div>	<!--  End Tab panes -->								
		</div>
	</div>	
</div>
<script>
jQuery(function($){
	$("li a","ul#show").click(function(){
		var siteurl = $(this).attr("data-link");
		var brandtype = $(this).attr("data-type");
		
		var pageSelector = $("#pagiselector option:selected").val();
		
		var siteurl = siteurl + brandtype;
		var siteurl = siteurl + '&pagid=' + pageSelector;
		
		var gradeSelector = $("#gradeselector option:selected").val();
		
		var siteurl = siteurl + '&searchid=' + pageSelector;
		window.location = siteurl;
		
	});
});
jQuery(window).load(function(){
	adjust_carimg();
});
jQuery(window).on('resize', function() {
	jQuery('.car-data').height('auto');
	adjust_carimg();
});
function adjust_carimg(){
	var totalHeight = 0;
	jQuery('.car-data').each(function(){
		if(totalHeight < jQuery(this).height())
		{
			totalHeight = jQuery(this).height();
		}
	});
	if(totalHeight > 0 ){
		jQuery('.car-data').height(totalHeight);
	}
}
function changeGrade(siteurl)
{
	var selectedOption = $("#gradeselector option:selected").val();
	var siteurl = siteurl + selectedOption;
	
	var pageSelector = $("#pagiselector option:selected").val();
	var siteurl = siteurl + '&pagid=' + pageSelector;
	window.location = siteurl;
}

</script>
<?php get_footer();?> 