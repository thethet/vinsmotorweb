<?php 
/* Template Name: ourcarssearch-chinese*/
$para ='default';
if(isset($_GET['searchid'])){
	$para = $_GET['searchid'];
}
$paginumber = 6;
if(isset($_GET['pagid'])){
	$pagid = $_GET['pagid'];
	if($pagid=='default'){
		$paginumber = 6;
	}else{
		$paginumber = $pagid;
	}
}
if(isset($_GET['branch'])&!empty($_GET['branch'])){
	//$whbranch = sprintf(" AND combined.name='%s'",$_GET['branch']);
	if($_GET['branch']=='default'){
	 $chkbranch = '';
	}else{
	 $chkbranch = $_GET['branch'];
	}
}else{
	$chkbranch = '';
}
?>
<?php get_header();?>		
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
						<option <?php if($pagid=='default'){echo 'selected'; } ?> value="default">Select Per Page</option>
						<option <?php if($pagid=='3'){echo 'selected'; } ?> value="3">3 cars per page</option>
						<option <?php if($pagid=='6'){echo 'selected'; } ?> value="6">6 cars per page</option>
						<option <?php if($pagid=='9'){echo 'selected'; } ?> value="9">9 cars per page</option>
						<option <?php if($pagid=='12'){echo 'selected'; } ?> value="12">12 cars per page</option>
						<option <?php if($pagid=='500'){echo 'selected'; } ?> value="500">All</option>
					</select>
				<select id="gradeselector" onchange="changeGrade('<?php echo site_url()."/?page_id=254&searchid="; ?>')">
					<option <?php if($para =='default'){echo 'selected';}?> value="default">Select Grade</option>
					<?php foreach($selgrades as $value): ?>
						<option <?php if($para ==$value){echo 'selected';}?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
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
						if($chkbranch){
						
						if(isset($_GET['searchid'])){
							$gradeselectors = $_GET['searchid'];
							if($gradeselectors == 'default'){
								$gradewhere = '';
							}else{
								$gradewhere = sprintf("AND  vm.`meta_key`='car_grade'
										AND vm.`meta_value`='%s'",$_GET['searchid']);
							}
						}
						$customPagHTML     = "";
						$query = sprintf("
						select filterlanguage.* from
						(select * from vc_posts as vp
						inner join vc_term_relationships as vtr
						on vp.id=vtr.object_id
						where vp.post_status='publish' and vp.post_type='car' and vtr.`term_taxonomy_id`=15) as filterlanguage
						inner join
						(SELECT vp.* FROM vc_term_taxonomy AS vtt
							INNER JOIN
							vc_terms AS vt
							ON vt.`term_id`=vtt.`term_id`
							INNER JOIN vc_term_relationships AS vtr
							ON vtr.`term_taxonomy_id`=vt.`term_id`
							INNER JOIN vc_posts AS vp
							ON vp.`ID`=vtr.`object_id`
							WHERE vtt.`taxonomy`='brand' AND vt.`slug`='%s')as filterbrand
						on filterlanguage.id=filterbrand.id
						inner join
						(SELECT vp.* FROM vc_posts AS vp 
						INNER JOIN
						vc_postmeta AS vm
						ON vp.`ID`=vm.`post_id`
						WHERE vp.post_status='publish'
						AND vp.post_type='car' %s)as filtergrade
						on filterlanguage.id=filtergrade.id
						group by filterlanguage.id
						",$chkbranch,$gradewhere);
						
							$total_query     = "SELECT COUNT(1) FROM (${query}) AS combined_table";
							$total             = $wpdb->get_var( $total_query );
							$items_per_page = $paginumber;
							$page             = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
							$offset         = ( $page * $items_per_page ) - $items_per_page;
							$result         = $wpdb->get_results( $query . " LIMIT ${offset}, ${items_per_page}" );
							$totalPage         = ceil($total / $items_per_page);
						}else if($para == 'default'){
							$customPagHTML     = "";
						$query   =sprintf(" SELECT vp.* FROM vc_posts  AS vp
						INNER JOIN vc_term_relationships AS vtr
						ON vp.`ID`= vtr.`object_id`
						WHERE vp.post_status='publish' AND vp.post_type='car' AND vtr.`term_taxonomy_id`=15");
							$total_query     = "SELECT COUNT(1) FROM (${query}) AS combined_table";
							$total             = $wpdb->get_var( $total_query );
							$items_per_page = $paginumber;
							$page             = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
							$offset         = ( $page * $items_per_page ) - $items_per_page;
							$result         = $wpdb->get_results( $query . " ORDER BY vp.ID DESC LIMIT ${offset}, ${items_per_page}" );
							$totalPage         = ceil($total / $items_per_page);
						}else{ 
									
							$customPagHTML     = "";
							$query             =sprintf("SELECT vp.* FROM vc_posts AS vp 
								INNER JOIN
								vc_postmeta AS vm
								ON vp.`ID`=vm.`post_id`
								inner join 
								vc_term_relationships as vtr
								on vp.id=vtr.object_id
								WHERE vp.post_status='publish'
								AND vp.post_type='car'
								AND  vm.`meta_key`='car_grade'
								AND vm.`meta_value`='%s' and vtr.term_taxonomy_id=15",$para);
							$total_query     = "SELECT COUNT(1) FROM (${query}) AS combined_table";
							$total             = $wpdb->get_var( $total_query );
							$items_per_page = $paginumber;
							$page             = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
							$offset         = ( $page * $items_per_page ) - $items_per_page;
							$result         = $wpdb->get_results( $query . " ORDER BY vp.ID DESC LIMIT ${offset}, ${items_per_page}" );
							$totalPage         = ceil($total / $items_per_page);
						}
							 ?>
						<div class="row">
						<?php if($result){ ?>
						<?php foreach($result as $data): ?>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="car-data">
									<a href="<?php echo get_permalink( $data->ID );?>" alt="features" rel="features">	
									<?php echo get_the_post_thumbnail($data->ID,'medium',array('class'=> "img-responsive"));?>
									<h4>	
										<?php	$query = sprintf("SELECT vt.name  FROM vc_term_taxonomy AS vtt
												INNER JOIN
												vc_terms AS vt ON vtt.`term_id` =vt.`term_id`
												INNER JOIN 
												vc_term_relationships AS vtr ON vtt.`term_id`=vtr.`term_taxonomy_id`
												WHERE vtr.`object_id`=%d AND vtt.`taxonomy`='brand'",$data->ID);
										$datas = $wpdb->get_results($query);
										$datas = array_shift($datas); ?>
											<span class="titlecat"><?php echo $datas->name; ?></span>
											<?php echo $data->post_title; ?>
										</h4>
										</a>
								</div>
							</div>						
						<?php endforeach; ?>
						<?php }else{ ?>
						<div class="col-md-12" style="text-align:center;height:20px;line-height:20px;color:red;"><h2>Cars Not Found</h2></div>
						<?php } ?>
						</div>
						<?php
				if($totalPage > 1){
					$customPagHTML     =  '<div class="col-md-4 col-md-offset-4" id="pagination">'.paginate_links( array(
					'base' => add_query_arg( 'cpage', '%#%' ),
					'format' => '',
					'prev_text' => __('&laquo;'),
					'next_text' => __('&raquo;'),
					'total' => $totalPage,
					'current' => $page
					)).'</div>';
					}
					echo $customPagHTML;
						?>
			</div>
		</div>	
			 			
			<!--  Start Tab panes -->
			<div class="tab-content col-xs-12 col-sm-9 col-md-9">			
			<?php 			
					$brand_types = get_terms(TAXONOMY_BRAND_TYPE,array('hide_empty' => false,'parent' => 0));													
					foreach( $brand_types as $brand_type):
			?>									

								<div role="tabpanel" class="tab-pane" id="<?php echo $brand_type->slug;?>">
								<?php
							// Start the Loop.							 		
								if($para == 'selectall'){
									
									$args = array(
									'orderby'          => 'post_date',
									'order'            => 'ASC',
									'post_type'        => 'car',
									 'brand' => $brand_type->slug,
									'post_status'      => 'publish',								
								);
									
								}else{
								
									$args = array(
										'orderby'          => 'post_date',
										'order'            => 'ASC',
										'post_type'        => 'car',
										 'brand' => $brand_type->slug,
										 'meta_query'         =>  array(
																			array(
																				'key' => 'car_grade',
																				'value' => $para,
																			)
																		),
										'post_status'      => 'publish',								
									);
								
								}
						
								$cars = get_posts( $args );								
								foreach( $cars as $car ):
								
							?>
								<div class="col-xs-12 col-sm-4 col-md-4 car-data">
									<?php echo get_the_post_thumbnail($car->ID,'medium',array('class'=> "img-responsive"));?>
									<h4>
										<a href="<?php echo get_permalink( $car->ID );?>" alt="features" rel="features">
											<?php echo $car->post_title; ?>
											<?php echo $brand_type->slug;?>
										</a>
									</h4>
								</div>
								<?php endforeach; ?>
								</div>							
			<?php endforeach; ?>
			</div>	<!--  End Tab panes -->								
		</div>
	</div>	
</div>
<script>
jQuery(function($){
	var brandselect = '<?php if($_GET['branch']) { echo $_GET['branch']; }?>';
	
	jQuery('#show li a').each(function(){
		if(brandselect == $(this).attr('data-type')){
			$(this).parent().css({'background-color':'gray'});
		}
	});
	$("li a","ul#show").click(function(){
		var siteurl = $(this).attr("data-link");
		var brandtype = $(this).attr("data-type");
		
		var pageSelector = $("#pagiselector option:selected").val();
		
		var siteurl = siteurl + brandtype;
		var siteurl = siteurl + '&pagid=' + pageSelector;
		
		var gradeSelector = $("#gradeselector option:selected").val();
		
		var siteurl = siteurl + '&searchid=' + gradeSelector;
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
var ele = document.getElementById('menu-item-21');
ele.className +=' active';
function changeGrade(siteurl)
{
	var brandselect = '<?php if($_GET['branch']) { echo $_GET['branch']; }?>';
	
	var selectedOption = $("#gradeselector option:selected").val();
	var siteurl = siteurl + selectedOption;
	
	var pageSelector = $("#pagiselector option:selected").val();
	var siteurl = siteurl + '&pagid=' + pageSelector;
	
	if(brandselect){
	var siteurl = siteurl + '&branch='+ brandselect;
	}
	window.location = siteurl;
}
</script>
<?php get_footer();?>