<?php

session_start();

$servername="localhost";
$username="patel1ik_Practice";
$database="patel1ik_Practice";
$passwordD="group1";
$errors=array();

// connect to the database
// Create connection
$conn = mysqli_connect($servername, $username,$passwordD, $database);

// Check connection
if (!$conn) {
    exit("Exiting");
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['Register_user'])){
    if(isset($_POST['username']))
    $username=$_POST['username'];
    
    if(isset($_POST['email']))
    $email=$_POST['email'];

    if(isset($_POST['password_1']))
    $password_1=$_POST['password_1'];

    if(isset($_POST['password_2']))
    $password_2=$_POST['password_2'];

// form validation
if(empty($username)){array_push($errors,"Username is required");}
if(empty($email)){array_push($errors,"Email is required");}
if(empty($password_1)){array_push($errors,"Password is required");}
if($password_1 != $password_2){array_push($errors,"Passwords don't match");}

// check db for exisitng users

$result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username' OR email='$email';");
$get_results=mysqli_fetch_assoc($result);

if($get_results){
        // checks if the username already exists or not
    
        if($get_results['username']==$username){
    array_push($errors,"Username already exists, use a different username");
    $_SESSION['error']='Username already exists, use a different username <br/>';
    }
        // checks if the email already exists or not
        elseif($get_results['email']==$email){
        array_push($errors,"Email already exists, use a different username");
        $_SESSION['error']='Email already in use, use a different email <br/>';
    }
}

if(count($errors)==0){
       
        $password_1=md5($password_1);// this will encrypt the password
        $insert_query=mysqli_query($conn,"INSERT INTO user (username,email,password) VALUES('$username','$email','$password_1');");
        $_SESSION['username']=$username;
        $_SESSION['success']="You are now logged in";
         header('location: newFile.php');
    }
}
?>