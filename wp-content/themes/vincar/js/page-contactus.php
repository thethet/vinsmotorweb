<?php 
/* Template Name: contactus*/
get_header();?>
					
	<div class="section contactus">
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();		
		?>                    
       
		<?php  endwhile; endif; ?>
		<div class="container medium-container">
			<div class="row">
				<div class="col-md-6 contact-title1">
					<h2 class="title-bg">Contact form</h2>
					<h6 style="margin-top:24px;">Enter your comments through the form below, and our customer service professionals will contact you as soon as possible.</h6>
					  <?php  the_content(); ?> 
				</div>
				<div class="col-md-6 contact-title1">
					 <h2 class="title-bg">Locate us </h2>
					 <h4 style="color:#d63a1f;margin-top:24px;">Find Us Now !</h5>
						<ul class="contact-info list-unstyled">
							<li class="ct-address">Blk 12 Sin Ming Industrial Estate Sector B #01-67 S(575656)</li>
							<li class="ct-phone">6453 2121 (4 lines)</li>
							<li class="ct-fax">6459 9795</li>
							<li class="ct-email">vinsauto87@yahoo.com.sg</li>
						</ul>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6985661296435!2d103.8375499400211!3d1.3574773141812373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da17239f8ee95b%3A0x4ddc29d2f2e2f9cc!2s12+Sin+Ming+Industrial+Est+Sector+B%2C+01%2C+Singapore+575656!5e0!3m2!1sen!2smm!4v1464150799512" width="555" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>	
<?php get_footer();?>