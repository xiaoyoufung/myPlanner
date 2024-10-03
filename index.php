<?php session_start();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- style -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="mystyle.css"> -->
    
</head>
<body>
    <?php include('templates/overview-bar.php') ?>

    <div class="top-section">
        <div class="welcome-container">
            <p class="welcome-head">Welcome back <?= $_SESSION['username'] ?? "Guest"?>!</p>
            <p class="welcome-text">Let's plan your day today.</p>
            <img class="img-one" src="img/girlsitting.png" alt="girl-sitting" width="130px">
        </div>

        <div class="academic-container">
            <p class="academic-head">Academic</p>
            <p class="academic-text">Let's calculate your GPA to plan your study.</p>
            <a href="academic.php">
                <button class="more-btn">See more</button>
            </a>
            <img class="img-two" src="img/girlwithpiechart.png" alt="girlwithpiechart" width="120px">
        </div>
    </div>




    <div class="buttom-section">
        <div class="yellow-container">
            <img class="img-three" src="img/boypoint.png" alt="boypoint" width="320px">
        </div>

        <div class="buttom-two-section">
            <div class="timetable-container">
                <div class="timetable-detail">
                    <p class="timetable-head">Timetable</p>
                    <a href="timetable.php">
                        <img class="dropdown-icon-top" src="img/dropdown-grey-icon.svg" alt="dropdown-grey-icon" width="25px">
                    </a>
                </div>
                
                <div class="yellow-timetable">
                    <div class="yellow-timetable-container">
                        <?php include('templates/result.php') ?>
                    </div>
                </div>
            </div>

            <div class="wallet-sec">
                <a href="wallet.php"><div><p class="wallet-header">My Wallet</p></div></a>

                <div class="wallet-container">
                    <div class="wallet-one">
                        <p class="wallet-head">Your balance</p>
                        <p class="total-price"><?= "฿".number_format($total = $totalincome - $totalexpense) ?></p>
                    </div>

                    <div class="wallet-two">
                        <a href="income.php"><img class="wallet-icon-green" src="img/expense-icon.svg" alt="expense-icon" width="30px"></a>
                        <div>
                            <p class="num-text"><?= "฿".number_format($totalincome) ?></p>
                            <a href="income.php"><p class="num-text-income">Income</p></a>
                        </div>
                    </div>

                    <div  class="wallet-three">
                        <a href="expense.php"><img class="wallet-icon-red" src="img/income-icon.svg" alt="income-icon" width="30px"></a>
                        <div>
                            <p class="num-text"><?= "฿".number_format($totalexpense) ?></p>
                            <a href="expense.php"><p class="num-text-outcome">Outcome</p></a>
                        </div>
                    </div>


                    <div><img class="img-four" src="img/creditcard.png" alt="creditcard" width="130px"></div>
                    <div>
                        <a href="wallet.php">
                            <img class="dropdown-icon" src="img/dropdown-grey-icon.svg" alt="dropdown-grey-icon" width="25px">
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>

<!-- xamp http://localhost/954142/group-project/timetablev.3/index.php -->