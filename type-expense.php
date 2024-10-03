<?php 

    include('config/db_connect.php');

    // Check GET request id param
    if(isset($_GET['type'])) {
        $type = mysqli_real_escape_string($conn, $_GET['type']);

        include('config/db_connect_expense.php');
    }

?>

<html>
    <head>
        <link rel="stylesheet" href="css/expense.css">
    </head>
    <?php include('templates/header.php') ?>
    <?php displayheader("Expense","Add expense","expense.php","add-expense.php"); ?>

    <div class="detail-section-size">
        <p class="detail-page-head"> <?= typeoptiontext($type); ?> </p>

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
                <?php if($expense['type'] == $type): ?>
                <span class="result-date"><?= $expense['created_at'] ?></span>
                <span class="result-name"><?= $expense['name'] ?></span>
                <span class="result-amt"><?= "&nbsp;&nbsp;&nbsp;".number_format($expense['amount']) ?></span>

                <!-- condition -->
                <span>
                    <?php typeoption($expense['type']); ?>
                </span>

                <span>
                    <a class="detail" href="detail-expense.php?id=<?=$expense['id']?> ">
                    <img src="img/dropdown-darkgrey.svg" alt="dropdown-darkgrey" width="25px">
                    </a>
                </span>

                <?php $totalex = $totalex + $expense['amount'];?>
                <?php endif; ?>
                <?php endforeach; ?>
                </div>
                
            </div>
            <div class="total-container">
                <h2 class="total-head">Total</h2> 
                <p class="total-price"><?= number_format($totalex)." &nbsp;&nbsp;Baht" ?></p>
            <div>
        </div>
    </div>


    <!-- display type function -->
    <?php function typeoption($typeopt) { ?>
        <a href="type-expense.php?type=<?= $typeopt ?> ">  
                    <?php if($typeopt == 1): ?>
                        <div class="type f-type"> <?= "Food"; ?></div>
                    <?php elseif ($typeopt == 2): ?>
                        <div class="type b-type"> <?= "Beverage"; ?></div>
                    <?php elseif ($typeopt == 3): ?>
                        <div class="type e-type"> <?= "Entertain"; ?></div>
                    <?php elseif ($typeopt == 4): ?>
                        <div class="type l-type"> <?= "Laundry"; ?></div>
                    <?php elseif ($typeopt == 5): ?>
                        <div class="type u-type"> <?= "Utilities"; ?></div>
                    <?php endif; ?>
        </a>
    <?php } ?>

    <!-- display type text function -->
    <?php function typeoptiontext($typeopt) { ?>
                    <?php if($typeopt == 1): ?>
                        <?= "Food"; ?>
                    <?php elseif ($typeopt == 2): ?>
                        <?= "Beverage"; ?>
                    <?php elseif ($typeopt == 3): ?>
                        <?= "Entertain"; ?>
                    <?php elseif ($typeopt == 4): ?>
                      <?= "Laundry"; ?>
                    <?php elseif ($typeopt == 5): ?>
                       <?= "Utilities"; ?>
                    <?php endif; ?>
    <?php } ?>

</html>