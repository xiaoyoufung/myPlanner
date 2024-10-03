<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- style -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/wallet.css">

</head>
<body>
    <?php include('templates/overview-bar.php') ?>
    <?php include('templates/type-card.php') ?>

    <div class="top-sec">
        <div><p class="wallet-header">My Wallet</p></div>

        <div class="top-sec-container">
            <div class="wallet-sec">
                <div class="wallet-container">
                    <div class="wallet-one">
                        <p class="wallet-head">Your balance</p>
                        <p class="total-head-price"><?= "฿".number_format($totalbalance = $totalincome - $totalexpense) ?></p>
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


                    <div><img class="img-creditcard" src="img/creditcard.png" alt="creditcard" width="130px"></div>
                </div>
            </div>

            <div class="yellow-top">
                <img class="img-two" src="img/girlwithpiechart.png" alt="girlwithpiechart" width="142px">
            </div>
        </div>
    </div>


    <div class="btm-sec">
        <div class="yellow-btm">
            <img class="img-three" src="img/girlpointright.png" alt="girlpointright" width="225px">
        </div>

        
        <div class="btm-right-sec">
            <div class="type-sec">
                <?php displaytype("Food",$totalfood,1); ?>
                <?php displaytype("Beverage",$totalbev,2); ?>
                <?php displaytype("Entertain",$totalent,3); ?>
            </div>

           

            <div class="add-container">
                <div class="add-top">
                    <div class="add-btn">
                        <a href="wallet.php"><button class="income-btn">Income</button></a>
                        <a href="wallet2.php"><button class="expense-btn">Expense</button></a>
                    </div>
                    <a href="income.php"><img class="add-icon" src="img/dropdown-grey-icon.svg" alt="dropdown-grey-icon" width="24px"></a>
                </div>
                <div class="add-form-container">
                    <div><?php include('add-income.php') ?><div>
                </div>
            </div>
        </div>
    </div>

   
    
</body>
</html>

