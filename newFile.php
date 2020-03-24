<?php

session_start();

echo isset($_SESSION['username']);
if(isset($_SESSION['username'])){
    // if($_SESSION['username']=="tvb"){
    //     echo "hi";
    // }
    $_SESSION['msg']="You must login first to view this page";
     header("location: login.php");
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>

<tittle>
<b>Home page</b>
</tittle>

</head>

<body>
<h1>This is the homepage</h1>
<?php
if(isset($_SESSION['success'])):?>

<div>
    <h3>
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </h3>
</div>

<?php endif ?>
<!--  if the user logs in print his/her information -->
<?php if(isset($_SESSION['username'])):?>

<h3>Welcome <strong><?php echo $_SESSION['username'];?></strong></h3>

<?php endif ?>
</body>
</html>