<?php

include('config/db_connect.php');

if(isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM courses WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        //success
        header('Location: timetable.php');
    }{
        // failure
        echo 'query error: '.mysql_error($conn);
    }
    
}

// check GET request id param
if(isset($_GET['id'])){
    
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM courses WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $course = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>


<html>
    <head><link rel="stylesheet" href="css/main.css"></head>
    <?php include('templates/header.php') ?>
    <?php displayheader("Timetable","Add course","timetable.php","add.php"); ?>

    <div class="detail-section-size">
        <p class="detail-page-head">Detail</p>

        <div class="detail-container">
        
            <?php if($course): ?>
                

                <div class="detail-section-container">

                <div>
                    <p class="detail-section-name"><?= strtoupper($course['name']) ?><p>
                </div>

                    <div>
                        <p class="detail-section">
                            <span><img class="icon-hover" src="img/calculate-icon.svg" alt="calculate-icon" width="25px"></span>
                            <span class="detail-section-head">Code</span> 
                            <span><?= $course['code'] ?></span> 
                        </p>
                    <div>

                    <div>
                        <p class="detail-section">
                            <span><img class="icon-hover" src="img/sci-bottle-triangle.svg" alt="sci-bottle-triangle" width="25px"></span>
                            <span class="detail-section-head">Section</span>  
                            <span> <?= $course['sec'] ?> </span> 
                        </p>
                    </div>

                    <div>
                        <p class="detail-section">
                                <span><img class="icon-hover" src="img/openbook-icon.svg" alt="filter-icon" width="25px"></span>
                                <span class="detail-section-head">Room </span>
                                <span> <?= $course['room'] ?> </span> 
                        </p>
                    </div>
                </div>

                

            <!-- DELETE FORM -->
            <form class="detail-form-delete" action="detail-course.php" method="POST">
                <a class="detail-back-btn" href="timetable.php">Go back<a>
                <input type="hidden" name="id_to_delete" value="<?= $course['id']?>">
                <input type="submit" name="delete" value="Delete" class="deletebtn">
            </form>

            <?php endif; ?>
        </div>
    </div>

</html>