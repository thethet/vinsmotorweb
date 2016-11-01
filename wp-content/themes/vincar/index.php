
<?php get_header(); ?>


	<div class="container small-container">
			<div class="row">	
				<div class="col-md-12">
					<h2 class="title-bg">Our Cars</h2>
				</div>	
			</div>
	</div>
	 <!-- Page Content -->
    <div class="container cars medium-container">
	<?php
				$returnlink = 181;
				if (get_locale() == 'en_AU') {
				$returnlink = 181;
				}else if(get_locale() == 'ja'){
				$returnlink = 180;
				}
			?>
			<?php
				if(isset($_GET['pagid']) & !empty($_GET['pagid'])){
					if($_GET['pagid']=='default'){
						$paginumber = 12;
					}else{
						$paginumber = $_GET['pagid'];
					}
				}else{
					$paginumber = 12;
				}
				
				if(isset($_GET['orderby']) & !empty($_GET['orderby'])){
				   if($_GET['orderby'] == 'default'){
				    $orderby = 'default';
				   }else{
				    $orderby = $_GET['orderby'];
				   }
				}else{
					$orderby = 'default';
				}
			?>
			<select id="pagiselector" class="homeselector" onchange="changepagiorder('<?php echo site_url()."/?page_id=".$returnlink."&pagid="; ?>')">
						<option <?php if($_GET['pagid']=='default'){echo 'selected';}?> value="default">Select Per Page</option>
						<option <?php if($_GET['pagid']==4){echo 'selected';}?> value="4">4</option>
						<option <?php if($_GET['pagid']==8){echo 'selected';}?> value="8">8</option>
						<option <?php if($_GET['pagid']==12){echo 'selected';}?> value="12">12</option>
						<option <?php if($_GET['pagid']==16){echo 'selected';}?> value="16">16</option>
						<option <?php if($_GET['pagid']==500){echo 'selected';}?> value="500">All</option>
					</select>
			
			<select id="orderselector" class="homeselector" onchange="changepagiorder('<?php echo site_url()."/?page_id=".$returnlink."&pagid="; ?>')">
						<option <?php if($orderby=='default'){echo 'selected';}?> value="DESC">SORT BY</option>
						<option <?php if($orderby=='DESC'){echo 'selected';}?> value="DESC">DESCENDING</option>
						<option <?php if($orderby=='ASC'){echo 'selected';}?> value="ASC"> ASCENDING</option>
					</select>	
		<div class="row">
            <div class="col-sm-12">
			
                <?php 
						$args = array(
							'posts_per_page'   => $paginumber,
							'orderby'          => 'ID',
							'order'            => $orderby,
							'post_type'        => 'car',
							'post_status'      => 'publish',								
						);				
						$cars = get_posts( $args );								
						foreach( $cars as $car ):
				?>
				<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="car-data">
							<a href="<?php echo get_permalink( $car->ID );?>" alt="features" rel="features">
							<?php echo get_the_post_thumbnail($car->ID,'medium',array('class'=> "img-responsive"));?>
							<h4>
								<?php
									global $wpdb;
									/*$query = sprintf("SELECT NAME  
														FROM vc_terms WHERE term_id IN (
														SELECT term_taxonomy_id 
														FROM vc_term_relationships 
														WHERE object_id = %d)",$car->ID);
									 $category = get_the_category($car->ID );
									 echo $category[0]->cat_name;*/
									 //$query = "select * from vc_terms";
									//  $data = $wpdb->get_results($query);
									 // print_r($data);
									 
							$query = sprintf("SELECT vt.name  FROM vc_term_taxonomy AS vtt
									INNER JOIN
									vc_terms AS vt ON vtt.`term_id` =vt.`term_id`
									INNER JOIN 
									vc_term_relationships AS vtr ON vtt.`term_id`=vtr.`term_taxonomy_id`
									WHERE vtr.`object_id`=%d AND vtt.`taxonomy`='brand'",$car->ID);
							$data = $wpdb->get_results($query);
							$data = array_shift($data);
                            											 
								?>
								<span class="titlecat"><?php echo $data->name; ?></span>
								<?php echo $car->post_title; ?>
								
							</h4>
							</a>
						</div>
				</div>
				<?php endforeach; ?>
            </div>			
        </div>
		<div class="row">
			 <div class="col-sm-12">
				 <a href="<?php echo home_url();?>/our-cars" alt="features" rel="features" class="view-all">
					<img src="<?php echo get_template_directory_uri(); ?>/images/View-All.png" rel="Vin's Cars" alt="Vin's Cars" class="img-responsive">
				</a>
			</div>
		</div>
    </div>
    <!-- /.container -->
        <!-- ********** close content *********** -->
<script>
function changepagiorder(siteurl)
{
	var paginumber =$("#pagiselector option:selected").val();
	var siteurl = siteurl + paginumber;
	
	var orderby = $("#orderselector option:selected").val();
	var siteurl = siteurl + '&orderby=' + orderby;
	window.location = siteurl;
}

</script>
	<?php get_footer(); ?>
	

