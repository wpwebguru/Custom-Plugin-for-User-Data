<?php
/**
  * Plugin Name: Custom Plugin for User-Data
  * Plugin URI: https://github.com/wpwebguru/Custom-Plugin-for-User-Data
  * Description: Shortcodes:: [susy_login_user_name]  and [pub-username]. Shortcodes for Metadata:: [user-info-email] [user-info-name] [user-info-phone] [user-info-links] [user-info-whatsapp] | This shortcode is showing user info on the page [susy-user-phone] and [susy-user-phone]
  * Version: 1.1.6
  * Author: Sunny
  * Author URI:  https://github.com/wpwebguru
  * Text Domain: susymark
 * 
 */
 
 define( 'ABSPATH', $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/custom-plugin-for-user-data/' );
 

	// FIle including
	include_once ('inc/user-meta.php');
	include_once ('inc/functions.php');
	include_once ('inc/user-meta-spain.php');
	include_once ('inc/user-meta-eng.php');
	include_once ('inc/user-meta-polish.php');
	include_once ('inc/user-meta-swedish.php');
	include_once ('inc/user-meta-it.php');
	include_once ('shortcode-in-menus.php');

 
 add_shortcode('username-input', 'username_inputer');
  function username_inputer(){
	  
	   if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];   

	
      
	  ?>
		<form action="<?php echo $url; ?>" method="get">
			<?php
					if(isset($_GET['submit'])){
		  
					$userinfo = $_GET['username'];
	  
	  
				//	$config = mysqli_connect('localhost', 'root', '', 'develop');
				//	$views = "SELECT * FROM wp_usermeta WHERE meta_value ='$userinfo' ";
				
				
					$config = mysqli_connect('localhost', 'web40_5', 'CT#7QP*J*^qTaFKVYF7GbSt#ZMU#', 'web40_db5');
					$views = "SELECT * FROM gowp_users WHERE user_login ='$userinfo' ";
					$query = mysqli_query($config, $views);
		
					$mysqli_num = mysqli_num_rows($query);
					
					if (!$mysqli_num){
						return "<p style='color: red; font-size: 18px; padding-bottom: 10px; font-weight: 600;'>".esc_html__('Dieser Benutzername existiert nicht in unserer Datenbank!', 'susymark')."</p>";
					}else{
                    	return "<p style='color: #209b20; font-size: 18px; padding-bottom: 10px; font-weight: 600;'>✅ ".esc_html__('Perfekt, dass hat funktioniert.', 'susymark')."</p>";
                        return "<p style='color: #209b20; font-size: 18px; padding-bottom: 10px; font-weight: 600;'>👇 ".esc_html__('Unten findest Du jetzt Deine personalisierten Seiten', 'susymark')."</p>";
                    }
                        
                        
					}
			
			?>
			<input type="text" name="username" placeholder="DEIN BENUTZER NAME" class="username-inputer-box"/>
            
			<input type="submit" name="submit" value="Landingpages generieren" class="username-inputer-btn"/>
		
		</form>
	  
	  
	  <?php
	  
  }
  
  add_shortcode('pub-username', 'username_receiver');
  function username_receiver(){
	  
	  if(isset($_GET['submit'])){
		  
		  $userinfo = $_GET['username'];
	  
	  
		//$config = mysqli_connect('localhost', 'root', '', 'develop');
		//$views = "SELECT * FROM wp_usermeta WHERE meta_value ='$userinfo' ";
		
		$config = mysqli_connect('localhost', 'web40_5', 'CT#7QP*J*^qTaFKVYF7GbSt#ZMU#', 'web40_db5');
		$views = "SELECT * FROM gowp_users WHERE user_login ='$userinfo' ";
		
		$query = mysqli_query($config, $views);
		
		$mysqli_num = mysqli_num_rows($query);
		
		if($mysqli_num){
			return "<span>$userinfo</span>";
		
		}
		
	  }
  }

		// Display current user full name

		add_shortcode('susy_login_user_name', 'susy_login_user_full_name');

		function susy_login_user_full_name(){
			 global $current_user;
			 wp_get_current_user();
		
			// echo  $current_user->user_firstname . '<br />';
			// echo  $current_user->user_lastname;
	
			return '<span style="color: #fff;">'.$current_user->user_firstname.' '. $current_user->user_lastname . '</span>';
		
		}

		// Display current username
		function username_wp(){
			global $current_user;
			wp_get_current_user();
	
			return $current_user->user_login;
		}
		add_shortcode('susy-ref', 'username_wp');



/*================================================================================
                Custom Function
 ================================================================================*/

		// Redirct function for 404 error page
		
	add_action( 'template_redirect', 'redreict_to_custom_404_page' );
function redreict_to_custom_404_page(){
    // check if is a 404 error
    if( is_404()  ){
        wp_redirect( home_url( '' ) );
        exit();
    }
}
/****************************************************************
******************* WP Members Plugin Functions *****************
*****************************************************************/

		// Redirecting WordPress urls for registration

/*
add_filter( 'register_url', 'redirect_after_register_url' );
function redirect_after_register_url( $url ) {
    return 'https://www.susy.marketing/danke/';
}
*/

    add_action('wpmem_register_redirect', 'redirect_after_register_url');

    function redirect_after_register_url( $fields ){
        wp_redirect ( 'https://www.susy.marketing/danke/' );
        exit();
    }

// Register Button text changer
/*	add_filter( 'wpmem_default_text_strings', function($text) {
	$text = array(
		 'register_submit'      => __( 'JETZT ANMELDEN | FREISCHALTUNG INNERHALB 24h', 'wp-members' ),
	);
	return $text;
});
*/

