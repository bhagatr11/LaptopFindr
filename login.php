<?php include('server.php') ?>


<!DOCTYPE html>
<html>
<head>

<tittle>
<b>Login</b>
</tittle>

</head>

<body>
<div class ="container">
    <div calss= "header">

    </div>
    </br>
    </br>
    <form action="login.php" method="post">

    <div>
    <label for="username">Username</label>
    <input type="text" name="username" required>
    </div>
    
    <div>
    <label for="password">Password</label>
    <input type="password" name="password_1" required>
    </div>

   
    <button type="Submit" name="login_user">Log In</button>

    <p>New User? <a href="registeration.php"><b>Register</b></a></p>
    </form>

</div>

</body>
</html>