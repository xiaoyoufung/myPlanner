<?php 

    include('config/db_connect.php');

    // Check GET request id param
    if(isset($_GET['type'])) {
        $type = mysqli_real_escape_string($conn, $_GET['type']);

        include('config/db_connect_income.php');

        // close connection
        mysqli_close($conn);
    }
    
?>

<html>
    <head>
        <link rel="stylesheet" href="css/expense.css">
    </head>
    <?php include('templates/header.php') ?>
    <?php displayheader("Income","Add income","income.php","add-income.php"); ?>

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
        
                <?php foreach($incomes as $income):?>
                <?php if($income['type'] == $type): ?>
                <span class="result-date"><?= $income['created_at'] ?></span>
                <span class="result-name"><?= $income['name'] ?></span>
                <span class="result-amt"><?= "&nbsp;&nbsp;&nbsp;".number_format($income['amount']) ?></span>

                <!-- condition -->
                <span>
                    <?php typeoption($income['type']); ?>
                </span>

                <span>
                    <a class="detail" href="detail-income.php?id=<?=$income['id']?> ">
                    <img src="img/dropdown-darkgrey.svg" alt="dropdown-darkgrey" width="25px">
                    </a>
                </span>

                <?php $totalin = $totalin + $income['amount'];?>
                <?php endif; ?>
                <?php endforeach; ?>
                </div>
                
            </div>
            <div class="total-container">
                <h2 class="total-head">Total</h2> 
                <p class="total-price"><?= number_format($totalin)." &nbsp;&nbsp;Baht" ?></p>
            <div>
        </div>
    </div>


    <!-- display type function -->
    <?php function typeoption($typeopt) { ?>
        <a href="type-income.php?type=<?= $typeopt ?> ">  
                    <?php if($typeopt == 1): ?>
                             <div class="fix-type"> <?= "Fixed Income"; ?></div>
                        <?php elseif ($typeopt == 2): ?>
                            <div class="ext-type"> <?= "Extra Income"; ?></div>
                    <?php endif; ?>
                </a>
    <?php } ?>

    <!-- display type text function -->
    <?php function typeoptiontext($typeopt) { ?>
        <?php if($typeopt == 1): ?>
            <?= "Fixed Income"; ?>
        <?php elseif ($typeopt == 2): ?>
            <?= "Extra Income"; ?>
        <?php endif; ?>
    <?php } ?>

</html>