<?php 

include_once("../DBconnect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From customers where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO customers(fname,lname,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: user_login.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM customers WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['customer_id'] = $row['customer_id']; 
    $_SESSION['email'] = $row['email'];
    header("Location: ../prioduct + cart/index.php");
    exit();
}

   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>