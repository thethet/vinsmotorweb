<?php 
/* Template Name: aboutus*/
get_header();?>
<div class="section aboutus">
		<div class="container small-container">
		<?php $p = get_page(157); ?>
			<div class="row">				
				<h2 class="title-bg"><?php echo $p->post_title; ?></h2>				
			</div>
		</div>
		<?php 
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();		
					the_content();
		?>      	
		<?php 			
			endwhile;
			endif;
		?>
</div>	
<?php get_footer();?>