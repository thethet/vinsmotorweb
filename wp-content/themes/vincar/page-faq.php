<?php 
/* Template Name: support*/
get_header();?>
					
	<div class="section support">
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();		
		?> 
			<div class="container medium-container">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<h2 class="title-bg" ><?php  the_title(); ?> </h2>
					</div>
				</div>
			</div>
        <?php  the_content(); ?> 
		<?php  endwhile; endif; ?>
	</div>
<?php get_footer();?>