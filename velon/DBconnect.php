<?php

$servername="localhost";
$username="root";
$password="";
$dbname="velon_1";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
	}
else{
	mysqli_select_db($conn, $dbname);
	//echo "connection successful";
	}
	
?>