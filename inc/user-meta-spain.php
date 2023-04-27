<?php
   
   // Database config
	require_once ('config.php');
   // This functions for Spain language
	add_shortcode('susy-user-email-spain', 'user_email_withour_link_spain');
	add_shortcode('susy-user-phone-spain', 'user_phone_without_link_spain');

	add_shortcode('user-info-email-spain', 'user_data_email_spain');
	add_shortcode('user-info-name-spain', 'user_data_name_spain');
	add_shortcode('user-info-phone-spain', 'user_data_phone_spain');
	add_shortcode('user-info-links-spain', 'user_data_links_spain');
	add_shortcode('user-info-whatsapp-spain', 'user_data_whatsapp_spain');

	add_shortcode('user-info-whatsapp-without-text-spain', 'user_data_whatsapp_without_text_spain');



	// User info Email
	function user_email_withour_link_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			
			$row = mysqli_fetch_assoc($query);
			
			$ss_email = $row['user_email'];
			
			return "<span class='susy-email'>{$ss_email}</span>";
            
		} 
	}


	// User info Email
	function user_data_email_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			
			$row = mysqli_fetch_assoc($query);
			
			$ss_email = $row['user_email'];
			
		//	return "<p class='susy-email'>{$ss_email}</p>";
            
            return "<a href='mailto:{$ss_email}' target='_blank' id='susy-links'>". __( 'Pincha aquí', 'susymark' )."</a>";
		} 
	}
	
	
	
	// User info Full Name
	function user_data_name_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$firstname = get_user_meta( $user_id, $key = 'first_name', $single = true );
			$lastname = get_user_meta( $user_id, $key = 'last_name', $single = true );
            
			
			return "<sapn class='susy-fristname'>{$firstname}</span>" ."<span class='susy-lastname'> {$lastname}</sapn>";
			
		} 
	}
	
	
	
	// User info Phone Number
	function user_data_phone_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$phonenumber = get_user_meta( $user_id, $key = 'billing_phone', $single = true );
			
		//	return "<p class='susy-phone'>{$phonenumber}</p>";
            
            
            return "<a href='tel:{$phonenumber}' target='_blank' id='susy-links'>" . __( 'Pincha aquí', 'susymark' ) . "</a>";
			
		} 
	}

	// User info Phone Number
	function user_phone_without_link_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$phonenumber = get_user_meta( $user_id, $key = 'billing_phone', $single = true );
			
			return "<span class='susy-phone'>{$phonenumber}</span>";
            
			
		} 
	}
	
	
		// User info Link
	function user_data_links_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$uslinks = get_user_meta( $user_id, $key = 'telegram_profil1', $single = true );
            
             if(empty($uslinks)){
                return "";
            }else{
            	return "<a href='{$uslinks}' target='_blank' id='susy-links'>" . __( 'Pincha aquí', 'susymark' ) . "</a>";
            }
			
		} 
	}



		// User info whatsapp Link
	function user_data_whatsapp_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$whatsapp = get_user_meta( $user_id, $key = 'whatsapp', $single = true );
			
            if(empty($whatsapp)){
                return "";
            }else{
            	return "<a href='https://api.whatsapp.com/send?phone={$whatsapp}&text=Ich hätte gerne mehr Infos zu ROOT' target='_blank' id='susy-links'>" . __( 'Pincha aquí', 'susymark' ) . "</a>";
            }
            
		} 
	}


		// User info whatsapp Link without click text
	function user_data_whatsapp_without_text_spain(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$whatsapp = get_user_meta( $user_id, $key = 'whatsapp', $single = true );
			
            if(empty($whatsapp)){
                return "";
            }else{
            	return "https://api.whatsapp.com/send?phone={$whatsapp}&text=Me gastaría mas información sobre Root";
            }
            
		} 
	}