<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="sec-container">
            <!-- <div class="first-con">
                <div class="head">Welcome to <span class="brand-logo">myPlanner</span></div>
                <div class="detail">An online daily planner that boosts your productivity to the best level. Let's plan your day like a pro.</div>
            </div> -->
            <div class="img-window"><img src="img/window.png" alt="Brown Solid" width="280"></div>
            <div class="img-one"><img src="img/10.png" alt="Boy infront Labtop" width="350"></div>
            <div class="img-two"><img src="img/12.png" alt="Brown Solid" width="120"></div>
            
        </div>
        <div class="sec-container">
            <div class="form-container">
                <div class="form">
                    <div class="header">
                        <h2>Login</h2>
                        <p class="registext">Don't have an account? <a href="register.php">Register</a></p>
                    </div>
                    
                    <form action="login_db.php" method="post">
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
                        <div class="input-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="input-text">
                        </div>
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="input-text">
                        </div>
                        <div class="logandpass">
                            <div><input type="checkbox"> Keep me logged in</div>
                            <div><a class="forgetpass" href="">Forget Password</a></div>
                        </div>
                        <div class="input-btn">
                            <button type="submit" name="login_user" class="btn">Login</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>

<!-- http://localhost/954142/group-project/timetablev.2/login.php -->