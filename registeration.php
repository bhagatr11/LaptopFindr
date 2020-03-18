<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>

<tittle>Registeration
</tittle>

</head>

<body>
<div class ="container">
    <div calss= "header">
        <h2>Register</h2>
    </div>
    
    <form action="registeration.php" method="post">



    <div>
    <label for="username">Username</label>
    <input type="text" name="username" required>
    </div>
    

    <div>
    <label for="email">Email</label>
    <input type="email" name="email" required>
    </div>
    

    <div>
    <label for="password">Password</label>
    <input type="password" name="password_1" required>
    </div>

    <div>
    <label for="password">Password</label>
    <input type="password" name="password_2" required>
    </div>
    
    <button type="Submit">Submit</button>

    <p>Already a user?<a href="login.php"><b>Log in</b></a></p>
    
    </form>

</div>

</body>
</html>