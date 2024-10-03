<?php 

include('config/db_connect.php');

include('config/db_connect_income.php');

include('config/db_connect_expense.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myPlanner</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- style -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sidebar.css">

</head>
<body>
    
    <nav class="container">
        <!-- Top -->
        <div>
            <div><a href="index.php"><p class="brand-logo">myPlanner</p></a></div>
        </div>
        
        <!-- Middle -->
        <div>
            <!-- <a href="index.php">
                <div class="menu-hover">
                    <div class="bg-hover"></div>
                    <div><img class="icon-hover" src="img/overview-solid.svg" alt="overview-outline" width="20px"></div>
                    <div class="menu-name-hover">Overview</div>
                </div>
            </a> -->


            <a href="index.php">
                <div class="menu-container">
                    <div><img src="img/overview-outline.svg" alt="overview-outline" width="30px"></div>
                    <div class="menu-name">Overview</div>
                </div>
            </a>
            
            <a href="timetable.php">
                <div class="menu-container">
                    <div><img src="img/calendar-outline.svg" alt="calendar-outline" width="30px"></div>
                    <div class="menu-name">Timetable</div>
                </div>
            </a>

            <a href="wallet.php">
                <div class="menu-container">
                    <div><img src="img/wallet-outline.svg" alt="wallet-outline" width="30px"></div>
                    <div class="menu-name">wallet</div>
                </div>
            </a>
            
            <a href="academic.php">
                <div class="menu-container">
                    <div><img src="img/uni-outline.svg" alt="uni-outline" width="30px"></div>
                    <div class="menu-name">Academic</div>
                </div>
            </a>
            
        </div>

        <!-- Log-out Section -->
        <a href="login.php">
            <div class="menu-container log-out">
                <div><img src="img/logout-outline.svg" alt="logout-solid" width="30px"></div>
                <div class="logout-name"><p>Log Out</p></div>
            </div>
        </a>
    </nav>
    
</body>
</html>