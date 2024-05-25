<?php      

$host = "localhost";
$dbname = "form_db";
$db_username = "root";
$db_password = "";
      
$con = mysqli_connect($host, $db_username, $db_password, $dbname);

    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  