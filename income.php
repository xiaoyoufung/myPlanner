<?php

    include('config/db_connect.php');

    include('config/db_connect_income.php');
    
    // close connection
    mysqli_close($conn);
?>


<html>
    <head>
    <!-- css -->
    <link href="css/expense.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <title>Income</title>

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/012f1050b4.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="header">Income</div>
        <?php include('templates/overview-bar.php') ?>
        <?php include('add-income.php') ?>

        <div class="expense-table-container">
        <!-- Table head -->
        <div class="tablecon">
            <div class="grid">
                <!-- Table head -->
                <span class="table-head-name">
                    Date
                </span>
                <span class="table-head-name">
                    Name
                </span>
                <span  class="table-head-name">
                    Amount
                </span>
                <span class="table-head-name">
                    Type
                </span>
                
            </div>
        </div>

        <!-- Table body -->
        <div>
            
            <div class="grid tb-container">
            <?php foreach($incomes as $income):?>
                
            <span class="result-date"><?= $income['created_at'] ?></span>
            <span class="result-name"><?= $income['name'] ?></span>
            <span class="result-amt"><?= number_format($income['amount']) ?></span>

            <!-- condition -->
            <span>  
                <a href="type-income.php?type=<?=$income['type']?> ">  
                    <?php if($income['type'] == 1): ?>
                             <div class="fix-type"> <?= "Fixed Income"; ?></div>
                        <?php elseif ($income['type'] == 2): ?>
                            <div class="ext-type"> <?= "Extra Income"; ?></div>
                    <?php endif; ?>
                </a>
            </span>

            <span>
                <a class="detail" href="detail-income.php?id=<?=$income['id']?> ">
                <img src="img/dropdown-darkgrey.svg" alt="dropdown-darkgrey" width="25px">
                </a>
            </span>

           <!-- $totalin = $totalin + $income['amount']; -->

            <?php endforeach; ?>
            </div>
        </div>
        <div class="total-container">
            <h2 class="total-head">Total</h2> 
            <p class="total-price"><?= number_format($totalincome)." &nbsp;&nbsp;Baht" ?></p>
        <div>

        </div>
        
    </body>
</html>

<!--http://localhost/954142/group-project/timetablev.3/income.php -->