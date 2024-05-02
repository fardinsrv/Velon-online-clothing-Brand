<?php 

include_once("./DBconnect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=$password;
   
   $sql="SELECT * FROM admin WHERE id='$email' and password='$password'";
   $result=$conn->query($sql);
   if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc();

    header("location:admin_home.php");
    exit();
}

   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>