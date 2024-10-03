<?php 

    include('config/db_connect.php');

    if(isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM expenses WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            // success
            header('Location: expense.php');
        } {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    // Check GET request id param
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM `expenses` WHERE id = $id";

        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format 
        $expense = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // print_r($expense);
    }
?>

<html>
    <head><link rel="stylesheet" href="css/main.css"></head>
    <?php include('templates/header.php') ?>
    <?php displayheader("Expense","Add Expense","expense.php","add-expense.php"); ?>

    <div class="detail-section-size">
        <p class="detail-page-head">Detail</p>

        <div class="detail-container">
        
            <?php if($expense): ?>
                

                <div class="detail-section-container">

                <div>
                    <p class="detail-section-name"><?= $expense['name'] ?><p>
                </div>

                    <div>
                        <p class="detail-section">
                            <span><img class="icon-hover" src="img/calculate-icon.svg" alt="calculate-icon" width="25px"></span>
                            <span class="detail-section-head">Amount</span> 
                            <span><?= $expense['amount'] ?></span> 
                        </p>
                    <div>

                    <div>
                        <p class="detail-section">
                            <span><img class="icon-hover" src="img/calendar-grey-outline.svg" alt="calendar-grey-outline" width="25px"></span>
                            <span class="detail-section-head">Date</span>  
                            <span> <?= $expense['created_at'] ?> </span> 
                        </p>
                    </div>

                    <div>
                        <p class="detail-section">
                                <span><img class="icon-hover" src="img/filter-icon.svg" alt="filter-icon" width="25px"></span>
                                <span class="detail-section-head">Type </span>
                                <span>
                                    <a href="type-expense.php?type=<?=$expense['type']?> ">  
                                    <?php if($expense['type'] == 1): ?>
                                            <span class="type f-type"> <?= "Food"; ?></span>
                                        <?php elseif ($expense['type'] == 2): ?>
                                            <span class="type b-type"> <?= "Beverage"; ?></span>
                                        <?php elseif ($expense['type'] == 3): ?>
                                            <span class="type e-type"> <?= "Entertain"; ?></span>
                                        <?php elseif ($expense['type'] == 4): ?>
                                            <span class="type l-type"> <?= "Laundry"; ?></span>
                                        <?php elseif ($expense['type'] == 5): ?>
                                            <span class="type u-type"> <?= "Utilities"; ?></span>
                                        <?php endif; ?> 
                                    </a>
                                </span>
                        </p>
                    </div>
                </div>

                

            <!-- DELETE FORM -->
            <form class="detail-form-delete" action="detail-expense.php" method="POST">
                <a class="detail-back-btn" href="expense.php">Go back<a>
                <input type="hidden" name="id_to_delete" value="<?= $expense['id']?>">
                <input type="submit" name="delete" value="Delete" class="deletebtn">
            </form>

            <?php endif; ?>
        </div>
    </div>

</html>