<?php

session_start();

$servername="localhost";
$username="patel1ik_Practice";
$database="patel1ik_Practice";
$passwordD="group1";
$errors = array();

// connect to the database
// Create connection
$conn = mysqli_connect($servername, $username,$passwordD, $database);

// Check connection
if (!$conn) {
    exit("Exiting");
    die("Connection failed: " . mysqli_connect_error());
}
else
echo "Connected successfully";

// $d= mysqli_query($conn,"SELECT * FROM user;");
// $d1=mysqli_fetch_assoc($d);

// echo $d1['username']."<br/>";
// echo $d1['password']."<br/>";
if(isset($_POST['login_user'])){

    if(isset($_POST['username']))
    $username=$_POST['username'];
    
    if(isset($_POST['password_1']))
    $password=md5($_POST['password_1']);

$result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");
$get_result=mysqli_fetch_assoc($result);

if(mysqli_num_rows($result)){
     $_SESSION['username']=$username;
    $_SESSION['success']="Logged in successfully";
    header('location: newFile.php');
}
else{
    array_push($errors,"Wrong username/password. Please try again ");
}
}
 ?>