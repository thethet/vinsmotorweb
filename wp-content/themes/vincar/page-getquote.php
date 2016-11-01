<?php 
/* Template Name: getquote*/
get_header();?>
					
	<div class="section getaquote">
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();		
		?>                    
       
		<?php  endwhile; endif; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-8  col-md-offset-2 contact-title1">
					<h2 class="title-bg">Get A Quote</h2>
					  <?php  the_content(); ?> 
				</div>
			</div>
		</div>
	</div>	
<?php get_footer();?>