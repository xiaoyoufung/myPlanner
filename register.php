<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- CSS -->
     <link rel="stylesheet" href="css/login.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

</head>
<body>
    <div class="container">
        <div class="sec-container">
            <div class="img-window"><img src="img/window.png" alt="Brown Solid" width="280"></div>
            <div class="img-one"><img src="img/10.png" alt="Boy infront Labtop" width="350"></div>
            <div class="img-two"><img src="img/12.png" alt="Brown Solid" width="120"></div>
            
        </div>
        <div class="sec-container-regis">
            <div class="form-container-regis">
                <div class="form">
                    <div class="header">
                        <h2>Register</h2>
                        <p class="logintext">Already a member? <a href="login.php">Sign in</a></p>
                    </div>

                    <form action="register_db.php" method="post">
                        <?php include('errors.php'); ?>
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="error">
                                <h3>
                                    <?php 
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                </h3>
                            </div>
                        <?php endif ?>
                        <div class="input-group-regis">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="input-text">
                        </div>
                        <div class="input-group-regis">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="input-text">
                        </div>
                        <div class="input-group-regis">
                            <label for="password_1">Password</label>
                            <input type="password" name="password_1" class="input-text">
                        </div>
                        <div class="input-group-regis">
                            <label for="password_2">Confirm Password</label>
                            <input type="password" name="password_2" class="input-text">
                        </div>
                        <div class="btn-contain">
                            <button type="submit" name="reg_user" class="btn">Register</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!-- run!  http://localhost/myPlanner/register.php -->