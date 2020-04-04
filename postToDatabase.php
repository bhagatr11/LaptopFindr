<?php
session_start();
echo "Hello";
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
    echo "Not connected";
    // exit("Exiting");
    // die("Connection failed: " . mysqli_connect_error());
}

else
echo "Connected successfully";

//Get variables from POST
$userName = mysql->real_escape_string($_POST['username']);
$favourites = mysql->real_escape_string($_POST['favourites']);

//UPDATE favourite laptops for user in database
if ($favourites != '') {
  $update_query=$conn->prepare("UPDATE user SET favourites = ? WHERE username = ?");
  $update_query->bind_param("s", $favourites, $userName);
  $update_query->execute();
}


//Select the new favourites from database
$result = $conn->prepare "SELECT favourites FROM user WHERE username = ?");
$result->bind_param("s", $userName);
$result->execute();
$get_results = $result->get_result(); 


if($get_results) {
    //make the new favourites available to request.js
    print_r($get_results); 
}

if(count($errors)==0){
    header('location: find-a-laptop.php');

}
        
    
?>