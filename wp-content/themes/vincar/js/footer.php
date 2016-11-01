	<section class="footer-banner">
		<?php  if(is_home() || is_front_page()){ ?>
         <img src="<?php echo get_template_directory_uri(); ?>/images/footer-banner.jpg" class="img-responsive">
		 <?php 
	}
	else {
	?>
		<img src="<?php echo get_template_directory_uri(); ?>/images/separator-bot.jpg" class="img-responsive">
	<?php 
	}
	?>
    </section>
	<div class="container" style="padding:20px;">
		<div class="row">
		<div class="col-sm-12">	
		<div class="footer-logo">
			<div class="footer-images">
			  <img src="<?php echo get_template_directory_uri(); ?>/images/ward.jpg" class="img-responsive" >			
			  <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-responsive">			  
			</div>
			<div style="float:left;">
			<h4 style="margin: 0px 0px 20px 0px;">FOLLOW US ON</h4>
			<a href="https://www.facebook.com/vinsmotorpteltd/?fref=ts" style="display:inline-block;margin-right: 18px;"> 
				<img src="<?php echo get_template_directory_uri(); ?>/images/fblogo.jpg" class="img-responsive">
			</a>
			<a href="http://www.sgcarmart.com/directory/merchant.php?MID=15029" style="display: inline-block;"> 
				<img src="<?php echo get_template_directory_uri(); ?>/images/sgcaremart.jpg" class="img-responsive">
			</a>
			</div>		
		</div>
    </div>
    </div>
    </div>
	 <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
					 <?php if ( has_nav_menu( 'main_menu', 'mytheme' ) ) { ?>
							<?php 
									wp_nav_menu( array( 
										'container' => false, 
										'menu_class' => 'footer-nav', 
										'theme_location' => 'main_menu', 
										'fallback_cb' => 'display_home' 
										) ); 
							?>
					<?php } else { ?>
				<ul class="footer-nav">					
					 	<?php wp_list_pages('title_li=' ); ?>
                </ul>
				<?php	} ?>
                </div>
				<div class="col-lg-12 col-xs-12">
					<div class="footer inner">
							<a href="#">&copy; 2016. All Rights Reserved by Vins Car Rental Pte Ltd.</a>	
					</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery if( $("li").hasClass( "active" ) )-->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	
<script>
	
  $("#show").click(function(){
    $("#specificDiv").hide();
	$("#tabs").show();
	
});
</script>
  <script>
  $(function() {
    $('#myTabs a:first').tab('show') 
  });
</script>
<script>
$(function() {
    $('.dropdown-toggle').dropdown()
  });
</script>
<?php wp_footer(); ?>
</body>
</html>

