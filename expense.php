<?php

    include('config/db_connect.php');

    include('config/db_connect_expense.php');
?>


<html>
    <head>
    <!-- css -->
    <link href="css/expense.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <title>Expense</title>
   
    </head>

    <body>
        <div class="header">Expense</div>
        <?php include('templates/overview-bar.php') ?>
        <?php include('add-expense.php') ?>

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
            <?php foreach($expenses as $expense):?>
                
            <span class="result-date"><?= $expense['created_at'] ?></span>
            <span class="result-name"><?= $expense['name'] ?></span>
            <span class="result-amt"><?= "&nbsp;&nbsp;&nbsp;".number_format($expense['amount']) ?></span>

            <!-- condition -->
            <span>
                <a href="type-expense.php?type=<?=$expense['type']?> ">  
                    <?php if($expense['type'] == 1): ?>
                        <div class="type f-type"> <?= "Food"; ?></div>
                    <?php elseif ($expense['type'] == 2): ?>
                        <div class="type b-type"> <?= "Beverage"; ?></div>
                    <?php elseif ($expense['type'] == 3): ?>
                        <div class="type e-type"> <?= "Entertain"; ?></div>
                    <?php elseif ($expense['type'] == 4): ?>
                        <div class="type l-type"> <?= "Laundry"; ?></div>
                    <?php elseif ($expense['type'] == 5): ?>
                        <div class="type u-type"> <?= "Utilities"; ?></div>
                    <?php endif; ?>
                </a>
            </span>

            <span>
                <a class="detail" href="detail-expense.php?id=<?=$expense['id']?> ">
                <img src="img/dropdown-darkgrey.svg" alt="dropdown-darkgrey" width="25px">
                </a>
            </span>

           <!-- $totalex = $totalex + $expense['amount']; -->

            <?php endforeach; ?>
            </div>
        </div>
        <div class="total-container">
            <h2 class="total-head">Total</h2> 
            <p class="total-price"><?= number_format($totalexpense)." &nbsp;&nbsp;Baht" ?></p>
        <div>
        </div>

    </body>
</html>

<!--http://localhost/954142/group-project/timetablev.3/expense.php -->