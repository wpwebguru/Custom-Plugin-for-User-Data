<?php
   

   $cs_db_host = 'database-5007019476.ud-webspace.de';
   $cs_db_name = 'dbs5795160';
   $cs_db_user = 'dbu2575894';
   $cs_db_pass = 'v6|Ru/Mh6Q?vtbPCiF';

   $table_name = '_k_q_xusers';

	add_shortcode('user-info-email', 'user_data_email');
	add_shortcode('user-info-name', 'user_data_name');
	add_shortcode('user-info-phone', 'user_data_phone');
	add_shortcode('user-info-links', 'user_data_links');
	add_shortcode('user-info-whatsapp', 'user_data_whatsapp');


	// User info Email
	function user_data_email(){
		
		$config = mysqli_connect('database-5007019476.ud-webspace.de', 'dbu2575894', 'v6|Ru/Mh6Q?vtbPCiF', 'dbs5795160');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			
			$row = mysqli_fetch_assoc($query);
			
			$ss_email = $row['user_email'];
			
		//	return "<p class='susy-email'>{$ss_email}</p>";
            
            return "<a href='mailto:{$ss_email}' target='_blank' id='susy-links'>Klick hier</a>";
		} 
	}
	
	
	
	// User info Full Name
	function user_data_name(){
		
		$config = mysqli_connect('database-5007019476.ud-webspace.de', 'dbu2575894', 'v6|Ru/Mh6Q?vtbPCiF', 'dbs5795160');
		
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
		
		$config = mysqli_connect('database-5007019476.ud-webspace.de', 'dbu2575894', 'v6|Ru/Mh6Q?vtbPCiF', 'dbs5795160');
		
		if (isset($_REQUEST['ref'])) {
			
			$ref = $_REQUEST['ref'];
			$table = "SELECT * FROM oiibl_users WHERE user_login='$ref' ";
			$query = mysqli_query($config, $table);
			$row = mysqli_fetch_assoc($query);
			
			$user_id = $row['ID'];
			
			$phonenumber = get_user_meta( $user_id, $key = 'billing_phone', $single = true );
			
		//	return "<p class='susy-phone'>{$phonenumber}</p>";
            
            
            return "<a href='tel:{$phonenumber}' target='_blank' id='susy-links'>Klick hier</a>";
			
		} 
	}
	
	
		// User info Link
	function user_data_links(){
		
		$config = mysqli_connect('database-5007019476.ud-webspace.de', 'dbu2575894', 'v6|Ru/Mh6Q?vtbPCiF', 'dbs5795160');
		
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
            	return "<a href='{$uslinks}' target='_blank' id='susy-links'>Klick hier</a>";
            }
			
		} 
	}



		// User info whatsapp Link
	function user_data_whatsapp(){
		
		$config = mysqli_connect('database-5007019476.ud-webspace.de', 'dbu2575894', 'v6|Ru/Mh6Q?vtbPCiF', 'dbs5795160');
		
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
            	return "<a href='https://api.whatsapp.com/send?phone={$whatsapp}&text=Ich%20h%C3%A4tte%20gern%20Infos%20zu%20Deinem%20einzigartigen%20ROOT%20Business%20Angebot' target='_blank' id='susy-links'>Klick hier</a>";
            }
            
		} 
	}