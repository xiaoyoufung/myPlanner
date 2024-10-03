<?php

    include('config/db_connect.php');

    // write query for all courses
    $sql = 'SELECT id, day, name, code, sec, room, time, hour, color FROM courses';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting as an array
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    // print_r($courses);
    
?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>
    <?php include('templates/overview-bar.php') ?>

    <div class="result-container">
        <div class="timetable-header-section">
            <div class="header-left">
                    <a href="timetable.php" class="big-heading">Timetable</a>
                </div>
                <div class="header-right">    
                    <a href="add.php" ><button class="btn-brand">Add Course</button></a>
                </div>
        </div>
        
        <div class="table-cont">

            <!-- Time table -->
            <?php include('templates/timetable.php') ?>

            <!-- Result (each) Course -->
            <?php foreach($courses as $course):?>


            <!-- all condition -->
                <?php
                // time condition 
                for($i = 2; $i<13 ; $i++) {
                    if ($course['time'] == $i){
                    $time = $i; 
                    }
                }

                // time till
                if($course['hour'] == 1):
                    $timeto = intval($time) + 1;
                elseif ($course['hour'] == 2):
                    $timeto = intval($time) + 2;
                endif;

                // time show 
                if($course['time'] == 2):
                    $times = '0700';
                elseif($course['time'] == 3):
                    $times = '0800';
                elseif($course['time'] == 4):
                    $times = '0900';
                elseif($course['time'] == 5):
                    $times = '1000';
                elseif($course['time'] == 6):
                    $times = '1100';
                elseif($course['time'] == 7):
                    $times = '1200';
                elseif($course['time'] == 8):
                    $times = '1300';
                elseif($course['time'] == 9):
                    $times = '1400';
                elseif($course['time'] == 10):
                    $times = '1500';
                elseif($course['time'] == 11):
                    $times = '1600';
                endif;

                // time till show
                if($course['hour'] == 1):
                    $timetil = intval($times) + 100;
                elseif ($course['hour'] == 2):
                    $timetil = intval($times) + 200;
                endif;
            
                ?>
                <a href="detail-course.php?id=<?=$course['id']?> ">
                    <div class="cell entry" style="grid-column: <?= $time ?> / <?= $timeto ?>; grid-row: <?= $course['day'] ?>; color: #fff; background: <?= $course['color'] ?>" >
                            <?= strtoupper($course['name']) ?> <br>
                            <?= $course['code'] ?> (<?= $course['sec'] ?>-000)<br>
                            Room: <?= $course['room'] ?>, <?= $times ?> - <?= $timetil ?>
                    </div>
                </a>
            
            <?php endforeach; ?>
        </div>
    </div>
</html>


<!-- xampp http://localhost/954142/group-project/timetablev.2/index.php -->