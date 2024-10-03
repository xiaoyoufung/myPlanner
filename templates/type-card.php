<?php 

    include('config/db_connect.php');

    include('config/db_connect_expense.php');   
    
    $totalfood = 0;
    $totalbev = 0;
    $totalent = 0;

    foreach($expenses as $expense):
    if($expense['type'] == 1) {
        $totalfood = $totalfood + $expense['amount'];
    }

    if($expense['type'] == 2) {
        $totalbev = $totalbev + $expense['amount'];
    }

    if($expense['type'] == 3) {
        $totalent = $totalent + $expense['amount'];
    }

    endforeach;


?>

<html>

   <!-- display card type function -->
   <?php function displaytype($type,$price,$typeopt) { ?>
            <div class="type-card">
                <div class="type-top">
                    <p class="type-subhead">Type</p>
                    <a href="type-expense.php?type=<?=$typeopt?> "><img src="img/dropdown-grey-icon.svg" alt="dropdown-grey-icon" width="24px"></a>
                </div>

                <div class="type-mid">
                    <p class="type-head"><?= $type ?></p>
                </div>

                <div class="type-btm">
                    <div></div>
                    <p class="type-price"><?= "฿".$price ?></p>
                    <a href="type-expense.php?type=<?=$typeopt?> "><img src="img/three-icon.svg" alt="three-icon" width="24px"></a>
                </div>           
            </div>
    <?php } ?>

</html>