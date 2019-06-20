<?php
	session_start();
	//connecting to SQL server
	$conn = mysqli_connect("localhost","root","");
	// Create database
	$query= "CREATE DATABASE IF NOT EXISTS hospital_db";
   	if(!mysqli_query($conn,$query)){
	 echo "Error creating database: " . mysqli_error($conn);
	}
	$conn = mysqli_connect("localhost","root","","hospital_db");
	//check connection
	if(!$conn)
	{ 
		die("connection falied: " . mysqli_connect_error()); 
	}
	// Creating Hosptial Table
	$query = "CREATE TABLE IF NOT EXISTS `hospital` (
	  `patient_id` int(20) NOT NULL AUTO_INCREMENT,
	  `patient_name` varchar(1000) NOT NULL,
	  `disease` varchar(1000),
	  `sub_category_disease` varchar(1000),
	  `doctor_name` varchar(1000),
	  `ward_details` varchar(2000),
	  `disease_desc` varchar(10000),
 	  PRIMARY KEY (`patient_id`)
	) AUTO_INCREMENT=1" ;
	if(!mysqli_query($conn,$query)){
	 echo "Error creating table: " . mysqli_error($conn);
	}

	// Encryption and Decryption Function
	function encrypt_decrypt($action, $string) {
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = 'This is my secret key';
	    $secret_iv = 'This is my secret iv';
	    // hash
	    $key = hash('sha256', $secret_key);
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
	    if ( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    } else if( $action == 'decrypt' ) {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
	    return $output;
	}

?>