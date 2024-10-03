<?php

    include('config/db_connect.php');

    // write query for all courses
    $sql = 'SELECT * FROM courses';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting as an array
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    // print_r($courses);
    $totalcredit = 0;
    $totalgrade = 0;
    

    $a=[];
    $result = 0;
    $grade = 0;
    $gpa = 0;
    $totalcredit = 0;

    if(isset($_POST['submit'])) {
        $credit = 0;
        for($i = 0 ; $i < sizeof($courses); $i++) {
        $plus = $_POST['grade'.$i] * $_POST['credit'.$i];
        $credit = $credit + $_POST['credit'.$i];
        array_push($a,$plus);
        }
        foreach ($a as $grade) {
            $result = $result + $grade;
        }

        $totalcredit = $totalcredit + $credit;
        $gpa = $result / $credit;
        
    }
    
    
?>

<html>
    <head>
    <title> Academic </title>

    <!-- CSS -->
    <link href="css/academic.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    </head>
    <body>
        <?php include('templates/overview-bar.php') ?>

        <div class="header">
            <p>GPA Plan</p>
        </div>

            <!-- Table head -->
        <div class="tablecon">
            <div class="grid-two">
                <!-- Table head -->
                <span class="head">Code</span>
                <span class="head">Course</span>
                <span class="head">Credit</span>
                <span class="head">Grade</span>
            </div>
        </div>
        
        <!-- Table body -->
        <div class="tb-container">
            <div class="grid">
                <!-- Result (each) Course -->
                <?php foreach($courses as $course):?>

                <span class="result"><?= $course['code'] ?></span>
                <span class="result"><?= strtoupper($course['name']) ?></span>
                <?php endforeach; ?>
            </div>
            
        
            <div class="form">
                <form method="post">
                    <?php for($i = 0 ; $i < sizeof($courses); $i++) { ?>
                        <input class="int-box" type="text" name="credit<?=$i?>">
                        <div class="border"></div>
                        <div>
                        <select class="dropdown" name="grade<?=$i?>">
                            <option value=""></option>
                            <option value="4">A</option>
                            <option value="3.5">B+</option>
                            <option value="3">B</option>
                            <option value="2.5">C+</option>
                            <option value="2">C</option>
                            <option value="1.5">D+</option>
                            <option value="1">D</option>
                            <option value="0">F</option>
                        </select> 
                        </div>
                        <?php } ?>
                    <div>
                        <input class="submit-btn" type="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>

        <div class="submit-btn-row"></div>

        <div class="total-container">
            <p class="total-head">Your estimated GPA:</p> 
            <p class="total-credit"><?= $totalcredit;?></p>
            <p class="total-gpa"><?= number_format($gpa,2);?></p>
        <div>
        
        
        
    </body>
</html>

<!-- xampp http://localhost/954142/group-project/timetablev.3/academic.php -->