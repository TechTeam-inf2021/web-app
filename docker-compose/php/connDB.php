<?php 
	$servername = 'di_inter_tech_mysql';
	$username = 'webuser';
	$password = 'webpass';
	$dbname = 'di_internet_technologies_project';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: ".$conn->connect_error);
	} else {
		mysqli_set_charset($conn, 'utf8');	
	}
	
?>