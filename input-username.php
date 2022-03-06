<?php
/**
  * Plugin Name: Username Inputer
  * Plugin URI: https://github.com/wpwebguru
  * Description: Username Inputer for Landing Page. Shortcodes:: [username-input] and [pub-username]
  * Version: 1.1
  * Author: Sunny
  * Author URI:  https://github.com/wpwebguru
 * 
 */
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
					$views = "SELECT * FROM gowp_usermeta WHERE meta_value ='$userinfo' ";
					$query = mysqli_query($config, $views);
		
					$mysqli_num = mysqli_num_rows($query);
					
					if (!$mysqli_num){
						echo "<p style='color: red;'>FALSCH BENUTZER NAME</p>";
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
		$views = "SELECT * FROM gowp_usermeta WHERE meta_value ='$userinfo' ";
		
		$query = mysqli_query($config, $views);
		
		$mysqli_num = mysqli_num_rows($query);
		
		if($mysqli_num){
			echo "<span>$userinfo</span>";
		
		}
		
	  }
  }
  
  
  
  
  
  