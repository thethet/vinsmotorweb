<?php /*
Plugin Name: Home plugin
Description: A test plugin to demonstrate wordpress functionality
Author: Soe Thiha
Version: 0.1
*/
?>
<?php add_action('admin_menu', 'my_admin_menu');

function my_admin_menu() {
   
	add_menu_page("Theme setting", "VinCar", 'manage_options', 'theme_setting', 'overview','',4);
	add_action( 'admin_init', 'register_mysettings' ); //call register settings function
 }
 function register_mysettings() {
	register_setting( 'myoption-group', 'facebook' );
	register_setting( 'myoption-group', 'instagram' );
	register_setting( 'myoption-group', 'twitter' );
	register_setting( 'myoption-group', 'carousell' );
	register_setting( 'myoption-group', 'linkedin' );
	register_setting( 'myoption-group', 'mail' );
 } 
 
 function overview() { ?>
 <div class="wrap">
<h2>Vin Motor</h2>
    <form method="post" action="options.php" enctype="multipart/form-data">

        <?php settings_fields( 'myoption-group' ); ?>
		
		<div class="divider">
			<p><label>Facebook Link</label></p>
			<p>
			 <textarea name="facebook"> <?php echo get_option('facebook'); ?> </textarea>
			</p>
		</div>
		<div class="divider">
			<p><label>Instagram Link</label></p>
			<p>
			 <textarea name="instagram"> <?php echo get_option('instagram'); ?> </textarea>
			</p>
		</div>
		<div class="divider">
			<p><label>Twitter Link</label></p>
			<p>
			 <textarea name="twitter"> <?php echo get_option('twitter'); ?> </textarea>
			</p>
		</div>
		<div class="divider">
			<p><label>Carousell Link</label></p>
			<p>
			 <textarea name="carousell"> <?php echo get_option('carousell'); ?> </textarea>
			</p>
		</div>
		<div class="divider">
			<p><label>LinkedIn Link</label></p>
			<p>
			 <textarea name="linkedin"> <?php echo get_option('linkedin'); ?> </textarea>
			</p>
		</div>
		<div class="divider">
			<p><label>Mail</label></p>
			<p>
			 <input type="text" name="mail" value="<?php echo get_option('mail'); ?>"/>
			</p>
		</div>
		
        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>

<div class="imgupload">
<?php	handle_post(); ?>
        <h2>To Upload favicon</h2>
        <!-- Form to handle the upload - The enctype value here is very important -->
        <form  method="post" enctype="multipart/form-data">
                <input type='file' id='favicon' name='favicon'></input><br>
				<?php
					global $wpdb;
					$query = sprintf("select * from vc_posts where post_type='%s'",'favicon');
					$parentdatas = $wpdb->get_results($query);
					if($parentdatas){
						foreach($parentdatas as $parentdata){
							 
							 $query = sprintf("select * from vc_posts where post_parent=%d limit 1",$parentdata->ID);
							 $datas = $wpdb->get_results($query);
							 
							 
							 foreach($datas as $data){ ?>
								<img src="<?php echo $data->guid;?>" />
							 <?php
								
							 }
						}
					}
				
				?>
                <?php submit_button('Upload') ?>
        </form>
</div>


<?php } ?>
<?php 
	function handle_post(){
        // First check if the file appears on the _FILES array
        if(isset($_FILES['favicon'])){
		
		global $wpdb;
		
		$query = sprintf("select * from vc_posts where post_type='%s'",'favicon');
		$parentdatas = $wpdb->get_results($query);
		if($parentdatas){
			foreach($parentdatas as $parentdata){
				 
				 $query = sprintf("select * from vc_posts where post_parent=%d",$parentdata->ID);
				 $datas = $wpdb->get_results($query);
				 
				 wp_delete_post ($parentdata->ID, true);
				 
				 foreach($datas as $data){
					wp_delete_post ($data->ID, true);
				 }
			}
		}
			
				
				$my_post = array(
					'post_title' => '',
					'post_content' => '',
					'post_status' => 'draft',
					'post_type' => 'favicon', 
					);
 
					// Insert the post into the database
					$post_ID = wp_insert_post( $my_post );

				
				
                $pdf = $_FILES['favicon'];

                $uploaded=media_handle_upload('favicon',$post_ID);
                // Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
 
 
        }
}
?>
<?php
	function my_admin_styles() {
		wp_enqueue_style('thickbox');
	}
	function admin_home_style(){
		wp_enqueue_style("admin-home", get_template_directory_uri().'/admin/css/home.css');
	}
	if(isset($_GET['page'])){
		add_action('admin_print_styles', 'my_admin_styles');
		add_action('admin_print_styles', 'admin_home_style');
	}
?>








