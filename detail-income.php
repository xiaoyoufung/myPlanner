<?php 

    include('config/db_connect.php');
    
    if(isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM incomes WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            // success
            header('Location: income.php');
        } {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    // Check GET request id param
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM incomes WHERE id = $id";

        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format 
        $income = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // print_r($income);

    }

?>

<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <?php include('templates/header.php') ?>
    <?php displayheader("Income","Add income","income.php","add-income.php"); ?>

    <div class="detail-section-size">
        <p class="detail-page-head">Detail</p>

        <div class="detail-container">
        
            <?php if($income): ?>
                

                <div class="detail-section-container">

                <div>
                    <p class="detail-section-name"><?= $income['name'] ?><p>
                </div>

                    <div>
                        <p class="detail-section">
                            <span><img class="icon-hover" src="img/calculate-icon.svg" alt="calculate-icon" width="25px"></span>
                            <span class="detail-section-head">Amount</span> 
                            <span><?= $income['amount'] ?></span> 
                        </p>
                    <div>

                    <div>
                        <p class="detail-section">
                            <span><img class="icon-hover" src="img/calendar-grey-outline.svg" alt="calendar-grey-outline" width="25px"></span>
                            <span class="detail-section-head">Date</span>  
                            <span> <?= $income['created_at'] ?> </span> 
                        </p>
                    </div>

                    <div>
                        <p class="detail-section">
                                <span><img class="icon-hover" src="img/filter-icon.svg" alt="filter-icon" width="25px"></span>
                                <span class="detail-section-head">Type </span>
                                <span>
                                    <a href="type-income.php?type=<?=$income['type']?> ">  
                                        <?php if($income['type'] == 1): ?>
                                                <span class="fix-type"> <?= "Fixed Income"; ?></span>
                                            <?php elseif ($income['type'] == 2): ?>
                                                <span class="ext-type"> <?= "Extra Income"; ?></span>
                                        <?php endif; ?>
                                    </a>
                                </span>
                        </p>
                    </div>
                </div>

                

            <!-- DELETE FORM -->
            <form class="detail-form-delete" action="detail-income.php" method="POST">
                <a class="detail-back-btn" href="income.php">Go back<a>
                <input type="hidden" name="id_to_delete" value="<?= $income['id']?>">
                <input type="submit" name="delete" value="Delete" class="deletebtn">
            </form>

            <?php endif; ?>
        </div>
    </div>

</html>