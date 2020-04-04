<?php
session_start();
$servername="localhost";
$username="patel1ik_Practice1";
$database="patel1ik_Practice1";
$passwordD="group1";

$errors=array();

// connect to the database
// Create connection
$conn = new mysqli($servername, $username,$passwordD, $database);


// Check connection
if (!$conn) {
    // exit("Exiting");
    // die("Connection failed: " . mysqli_connect_error());
}

else
$insert_query=$conn->prepare("INSERT INTO user (username,email,password,favourites) VALUES(?,?,?,?);");

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


$result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1;");
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
       
                $username=stripslashes($username);
                $username=strip_tags($username);
                
                $email=trim($email," ");
                $email=stripslashes($email);
                $email=strip_tags($email);
                
                $password_1=trim($password_1," ");
                $password_1=stripslashes($password_1);
                $password_1=strip_tags($password_1);
                
                $password_1=md5($password_1);

                $insert_query->bind_param("sss",$username,$email,$password_1,"");

                if($insert_query->execute())
                {
                    $_SESSION['username']=$username;
                    $_SESSION['success']="You are now logged in";
                    
                    header('location: find-a-laptop.php');
                        
                }

        }
        
    } 
?>