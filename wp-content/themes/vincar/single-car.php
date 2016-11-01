<?php 
/* Template Name: 	*/
get_header();?>
<?php
global $wpdb;      
		$query = sprintf("select meta_value from vc_postmeta where post_id=695 and meta_key='field_57d12cdbf122c'");						
		$rentals = $wpdb->get_results($query);
		$rentals = array_shift($rentals);
		foreach($rentals as $key=>$value):
				$value = unserialize($value);
				$typeofrentals = $value['choices'];
			endforeach;
?>
<!-- /*to return car search page to select languae*/ -->
<?php
$reply = '';
if(isset($_POST['submit'])){
$from_add = "soethiha@innov8te.com.sg"; 

	$to_add = "mr.soethiha87@gmail.com"; //<-- put your yahoo/gmail email address here

	$subject = "VinMotor Quote Request";
	
	$message = "Name : ".$_POST['user-name']."\r\n";
	$message .= "PhoneNumber : ".$_POST['user-phone']."\r\n";
	$message .= "User-Mail : ".$_POST['user-mail']."\r\n";
	$message .= "Car Model : ".$_POST['car-model']."\r\n";
	$message .= "Rental : ".$_POST['car-rental']."\r\n";
	$message .= "Date : ".$_POST['user-date']."\r\n";
	$message .= "Remark : ".$_POST['remarks'];
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	
	
	if(wp_mail($to_add,$subject,$message,$headers)) 
	{
		$reply = "Mail sent Successful";
	} 
	else 
	{ 
 	   $reply = "Error sending email!";
	}
}
?>
<?php
	$returnlink = 251;
	if (get_locale() == 'en_AU') {
	$returnlink = 251;
	}else if(get_locale() == 'ja'){
	$returnlink = 254;
	}
?>	
<?php $currentlink = site_url().$_SERVER['REQUEST_URI']; ?>				
<div class="section cars">
		<div class="container medium-container">
			<div class="row">	
				<div class="col-md-12">
					<h2 class="title-bg">Our Cars Details</h2>
				</div>	
			</div>
		</div>
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();		
		?>                    
		<?php
			function getFeature($meta_key) {
			   global $wpdb;
			   $query = sprintf("select meta_value from vc_postmeta where post_id=%d and
								meta_key='%s'",get_the_ID(),$meta_key);
				$data = $wpdb->get_results($query);
				$data = array_shift($data);
				echo $data->meta_value;
			}
		?>
		<div class="container medium-container">   
			<div class="row">
				<div class="col-xs-12 col-sm-9 col-md-9" id="specificDiv">
				<h4 class=""><?php getFeature('make'); ?>  /  <?php getFeature('model'); ?></h4> 
						<?php 													
											if ( has_post_thumbnail() ) {
												$img_id = get_post_thumbnail_id(get_the_ID());
												$img = wp_get_attachment_image_src($img_id); 
											}
									?>	

						<?php
							the_content();
							 
							/* For WCK Plugin Using
								$features = get_post_meta( get_the_ID(), 'features', true );
								foreach( $features as $feature):
							*/
							$feature= get_fields($post->ID); 
						?>

						<?php if($returnlink == 251){ ?>						
						<div class="features">
							<li>
								<a href="#" class="txt-align"><span>Make </span><b>:</b></a>
								<div class="feature-name"><?php getFeature('make'); ?></div>
							</li>
							<li>
								<a href="#" class="txt-align"><span>Model</span><b>:</b></a>
								<div class="feature-name"><?php getFeature('model'); ?></div>
							</li>							
							<li>
								<a href="#" class="txt-align"><span>Engine capacity </span><b>:</b></a>
								<div class="feature-name"><?php getFeature('engine'); ?></div>
							</li>
							<li>
								<a href="#" class="txt-align"><span>Seating capacity</span><b>:</b></a>
								<div class="feature-name"><?php getFeature('seating'); ?></div>
							</li>
							<li>
								<a href="#" class="txt-align"><span>Car grade</span><b>:</b></a>
								<div class="feature-name"><?php getFeature('car_grade'); ?></div>
							</li>						
						</div>

						<div class="price">Price :</div>
						<div class="table-responsive">
						  <table class="table">
								<tr>
								  <th class="active">Daily</th>
								  <th class="success">Weekend</th>
								  <th class="warning">Weekly</th>
								  <th class="danger">Monthly</th>
								  <th class="info">Long Term Leasing(For 1 Year)</th>
								</tr>
								<tr>
								  <td><?php getFeature('daily'); ?></td>
								  <td><?php getFeature('weekend'); ?></td>
								  <td><?php getFeature('weekly'); ?></td>
								  <td><?php getFeature('monthly'); ?></td>
								  <td><?php getFeature('long_term_leasing'); ?></td>
								</tr>
						  </table>
						</div>
						<p>Terms & Conditions</p>
						<p><?php  the_excerpt(); ?> </p>


						<?php }else if($returnlink == 254){ ?>

						<div class="features">
							<li>
								<a href="#" class="txt-align"><span>作ります </span><b>:</b></a>
								<div class="feature-name"><?php getFeature('make'); ?></div>
							</li>
							<li>
								<a href="#" class="txt-align"><span>モデル</span><b>:</b></a>
								<div class="feature-name"><?php getFeature('model'); ?></div>
							</li>							
							<li>
								<a href="#" class="txt-align"><span>エンジン排気量 </span><b>:</b></a>
								<div class="feature-name"><?php getFeature('engine'); ?></div>
							</li>
							<li>
								<a href="#" class="txt-align"><span>座席定員</span><b>:</b></a>
								<div class="feature-name"><?php getFeature('seating'); ?></div>
							</li>
							<li>
								<a href="#" class="txt-align"><span>車のグレード</span><b>:</b></a>
								<div class="feature-name"><?php getFeature('car_grade'); ?></div>
							</li>						
						</div>

						<div class="price">価格 :</div>
						<div class="table-responsive">
						  <table class="table">
								<tr>
								  <th class="active">デイリー</th>
								  <th class="success">週末</th>
								  <th class="warning">毎週</th>
								  <th class="danger">毎月</th>
								  <th class="info">長期リース（ 1年間）</th>
								</tr>
								<tr>
								  <td><?php getFeature('daily'); ?></td>
								  <td><?php getFeature('weekend'); ?></td>
								  <td><?php getFeature('weekly'); ?></td>
								  <td><?php getFeature('monthly'); ?></td>
								  <td><?php getFeature('long_term_leasing'); ?></td>
								</tr>
						  </table>
						</div>
						<p>利用規約</p>
						<p><?php  the_excerpt(); ?> </p>

						<?php } ?>

				</div>
				<div class="col-xs-12 col-sm-3 col-md-3" style="float:right;"><!--  Start Nav tabs -->
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
					<select id="pagiselector" onchange="changeGrade('<?php echo site_url()."/?page_id=".$returnlink."&searchid="; ?>')">
						<option value="default">Select Per Page</option>
						<option value="3">3 cars per page</option>
						<option value="6">6 cars per page</option>
						<option value="9">9 cars per page</option>
						<option value="12">12 cars per page</option>
						<option value="500">All</option>
					</select>
					<select id="gradeselector" onchange="changeGrade('<?php echo site_url()."/?page_id=".$returnlink."&searchid="; ?>')">
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
							<li><img src="<?php echo get_template_directory_uri(); ?>/images/list-icon.png" alt="<?php echo $brand_type->slug;?>"><a href="javascript:void(0)" data-link="<?php echo site_url()."/?page_id=".$returnlink."&branch="; ?>" data-type="<?php echo $brand_type->slug;?>"><span><?php echo $brand_type->slug;?></span></a></li>

						 <?php endforeach; ?>
						</ul>
					</nav>			
				</div> <!--  End Nav tabs --> 
				<!--  Start Tab panes -->
			<div class="tab-content col-xs-12 col-sm-9 col-md-9">			
			<?php 			
					$brand_types = get_terms(TAXONOMY_BRAND_TYPE,array('hide_empty' => false,'parent' => 0));													
					foreach( $brand_types as $brand_type):
			?>									

								<div role="tabpanel" class="tab-pane" id="<?php echo $brand_type->slug;?>">
								<?php
							// Start the Loop.							 		
								$args = array(
									'posts_per_page'   => 5,
									'orderby'          => 'post_date',
									'order'            => 'ASC',
									'post_type'        => 'car',
									 'brand' => $brand_type->slug,
									'post_status'      => 'publish',								
								);
						
								$cars = get_posts( $args );								
								foreach( $cars as $car ):
								
							?>
								<div class="col-md-4 car-data">
									<?php echo get_the_post_thumbnail($car->ID,'medium',array('class'=> "img-responsive"));?>
									<h4>
										<a href="<?php echo get_permalink( $car->ID );?>" alt="features" rel="features">
											<span class="titlecat"><?php echo $brand_type->slug;?></span>
											<?php echo $car->post_title; ?>
										</a>
									</h4>
								</div>
								<?php endforeach; ?>
								</div>							
			<?php endforeach; ?>
			</div>	<!--  End Tab panes -->

			<?php if($returnlink == 251){ ?>
			<div class="getaquote">
				<div class="contact-title1 col-xs-12 col-sm-9 col-md-9">	
					<h2 class="title-bg">Get A Quote</h2>
					<p class="reply"><?php echo $reply; ?></p>
					<form  action="<?php echo $currentlink; ?>" method="post">
					<p><span class="yourname">Full Name*: </span><input type="text" name="user-name" required="required"></input> </p>

					<p><span class="yourname">HP Number: </span><input type="text" name="user-phone"></input> </p>

					<p><span class="yourname">Email Address*: </span><input type="mail" required="required" name="user-mail"></input>  </p>

					<p><span class="yourname">Car Make/Model : </span><input type="text" name="car-model" value="<?php getFeature('make');  ?> / <?php   getFeature('model'); ?>"></input> </p>

					<p><span class="yourname">Type of rental: </span><select name="car-rental">
					<?php foreach($typeofrentals as $key=>$value): ?>
						<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
					<?php endforeach; ?>
					</select>
					</p>

					<p><span class="yourname">Intended start date: </span><input type="text" id="datepicker" name="user-date"></input> </p>

					<p><span class="yourname">Remarks: </span><textarea name="remarks"></textarea> </p>
					
					<p style="text-align: right;margin-right: -20px;"><span class="yourname"> </span><input type="submit" name="submit" value="send message"/></p>
					
					</form>
				</div>
			</div><!--  End Get A Quote Form -->	

			<?php }else if($returnlink == 254){ ?>
				<div class="getaquote">
				<div class="contact-title1 col-xs-12 col-sm-9 col-md-9">	
					<h2 class="title-bg">見積もりを取得</h2>
					<p class="reply"><?php echo $reply; ?></p>
					<form  action="<?php echo $currentlink; ?>" method="post">
					<p><span class="yourname">フルネーム*: </span><input type="text" name="user-name" required="required"></input> </p>

					<p><span class="yourname">HP番号: </span><input type="text" name="user-phone"></input> </p>

					<p><span class="yourname">電子メールアドレス*: </span><input type="mail" required="required" name="user-mail"></input>  </p>

					<p><span class="yourname">車のメーカー/モデル : </span><input type="text" name="car-model" value="<?php getFeature('make');  ?> / <?php   getFeature('model'); ?>"></input> </p>

					<p><span class="yourname">レンタルの種類: </span><select name="car-rental">
						<?php foreach($typeofrentals as $key=>$value): ?>
						<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
					</select>
					</p>

					<p><span class="yourname">意図された開始日: </span><input type="text" id="datepicker" name="user-date"></input> </p>

					<p><span class="yourname">備考: </span><textarea name="remarks"></textarea> </p>
					
					<p style="text-align: right;margin-right: -20px;"><span class="yourname"> </span><input type="submit" name="submit" value="メッセージを送る"/></p>
					
					</form>
				</div>
			</div><!--  End Get A Quote Form -->	
			<?php } ?>

			</div>
		
		</div><?php  endwhile; endif; ?>	
</div>	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
/*var ele = document.getElementById('menu-item-21');
ele.className +=' active';*/
jQuery(function($){
	$( "#datepicker" ).datepicker();
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