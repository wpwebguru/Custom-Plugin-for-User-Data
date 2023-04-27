<?php
   

   // Database config
	require_once ('config.php');
   // This functions for German language

	add_shortcode('susy-user-email', 'user_email_withour_link');
	add_shortcode('susy-user-phone', 'user_phone_without_link');

	add_shortcode('user-info-email', 'user_data_email');
	add_shortcode('user-info-name', 'user_data_name');
	add_shortcode('user-info-phone', 'user_data_phone');
	add_shortcode('user-info-links', 'user_data_links');
	add_shortcode('user-info-whatsapp', 'user_data_whatsapp');

	add_shortcode('user-info-whatsapp-without-text', 'user_data_whatsapp_without_text');



	// User info Email
	function user_email_withour_link(){
		
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
	function user_data_email(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			
			$row = mysqli_fetch_assoc($query);
			
			$ss_email = $row['user_email'];
			
		//	return "<p class='susy-email'>{$ss_email}</p>";
            
            return "<a href='mailto:{$ss_email}' target='_blank' id='susy-links'>". __( 'Klick hier', 'susymark' )."</a>";
		} 
	}
	
	
	
	// User info Full Name
	function user_data_name(){
		
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
	function user_data_phone(){
		
		$config = mysqli_connect('127.0.0.1', 'unfqpvud3xlgu', '14lwgvzxgzav', 'dbdfgxozfbxuos');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$phonenumber = get_user_meta( $user_id, $key = 'billing_phone', $single = true );
			
		//	return "<p class='susy-phone'>{$phonenumber}</p>";
            
            
            return "<a href='tel:{$phonenumber}' target='_blank' id='susy-links'>" . __( 'Klick hier', 'susymark' ) . "</a>";
			
		} 
	}

	// User info Phone Number
	function user_phone_without_link(){
		
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
	function user_data_links(){
		
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
            	return "<a href='{$uslinks}' target='_blank' id='susy-links'>" . __( 'Klick hier', 'susymark' ) . "</a>";
            }
			
		} 
	}



		// User info whatsapp Link
	function user_data_whatsapp(){
		
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
            	return "<a href='https://api.whatsapp.com/send?phone={$whatsapp}&text=Ich hätte gerne mehr Infos zu ROOT' target='_blank' id='susy-links'>" . __( 'Klick hier', 'susymark' ) . "</a>";
            }
            
		} 
	}


		// User info whatsapp Link without click text
	function user_data_whatsapp_without_text(){
		
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
            	return "https://api.whatsapp.com/send?phone={$whatsapp}&text=Ich hätte gerne mehr Infos zu ROOT";
            }
            
		} 
	}