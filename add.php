<?php

    include('config/db_connect.php');
        
        $errors = array('day' => '', 'name' => '', 'code' => '', 'sec' => '', 'room' => '', 'time' => '', 'hr' => '', 'color' => '');

	    if(isset($_POST['submit'])){

            // check day
            if(empty($_POST['day'])){
                $errors['day'] = 'A day is required';
            } else {
                $day = $_POST['day'];
            }
            
            // check name
            if(empty($_POST['name'])){
                $errors['name'] = 'A name is required';
            } else{
                $name = $_POST['name'];
                if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
                    $errors['name'] = 'Name must be letters and spaces only';
                }
            }

            // check code
            if(empty($_POST['code'])){
                $errors['code'] = 'A code is required';
            } else {
                $code = $_POST['code'];
            }

            // check sec
            if(empty($_POST['sec'])){
                $errors['sec'] = 'A sec is required';
            } else {
                $sec = $_POST['sec'];
            }

            // check room
            if(empty($_POST['room'])){
                $errors['room'] = 'A room is required';
            } else {
                $room = $_POST['room'];
            }

            // check time
            if(empty($_POST['time'])){
                $errors['time'] = 'A time is required';
            } else {
                $time = $_POST['time'];
            }

            // check hr
            if(empty($_POST['hr'])){
                $errors['hr'] = 'A hr is required';
            } else {
                $hour = $_POST['hr'];
            }

            // check color
            if(empty($_POST['color'])){
                $errors['color'] = 'A color is required';
            } else {
                $color = $_POST['color'];
            }


		if(array_filter($errors)){
			//echo 'errors in form';
        } else {
            $day = mysqli_real_escape_string($conn, $_POST['day']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $code = mysqli_real_escape_string($conn, $_POST['code']);
            $sec = mysqli_real_escape_string($conn, $_POST['sec']);
            $room = mysqli_real_escape_string($conn, $_POST['room']);
            $time = mysqli_real_escape_string($conn, $_POST['time']);
            $hr = mysqli_real_escape_string($conn, $_POST['hr']);
            $color = mysqli_real_escape_string($conn, $_POST['color']);
        }

        // create sql
        $sql = "INSERT INTO courses(day,name,code,sec,room,time,hour,color) VALUES('$day','$name','$code','$sec','$room','$time','$hour','$color')";

        // save to db & check
        if(mysqli_query($conn, $sql)){
            //seccess
            header('Location: timetable.php');
        } else {
            // error
            echo 'query error: '.mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- style -->
        <link rel="stylesheet" href="css/main.css">
    </head>
	
	<?php include('templates/header.php'); ?>
    <?php displayheader("Timetable","Add course","timetable.php","add.php"); ?>

        <div class="detail-section-size">

		<form class="form-container" action="add.php" method="POST">
    
            <p class="add-head">Add a Course</p>

            <div class="timetable-resize">
            <p>Day:  <select name="day">
                            <option value=""></option>
                            <option value="2">Mon</option>
                            <option value="3">Tue</option>
                            <option value="4">Wed</option>
                            <option value="5">Thur</option>
                            <option value="6">Fri</option>
                        </select></p>    
            <div style="color: red;"><?= $errors['day']; ?></div>
            <p>Course:<input type="text" name="name" class="int-text"></p>
            <div style="color: red;"><?= $errors['name']; ?></div>
            <p>Course Code: <input type="text" name="code" class="int-text"> <br></p>
            <p>Section: <input type="text" name="sec" class="int-text"> <br></p>
            <p>Room: <input type="text" name="room" class="int-text"> <br></p>
            <p>Time:  <select name="time">
                        <option value=""></option>
                        <option value="2">7.00</option>
                        <option value="3">8.00</option>
                        <option value="4">9.00</option>
                        <option value="5">10.00</option>
                        <option value="6">11.00</option>
                        <option value="7">12.00</option>
                        <option value="8">13.00</option>
                        <option value="9">14.00</option>
                        <option value="10">15.00</option>
                        <option value="11">16.00</option>
                    </select></p>    
            <p>Hour:   <input type="radio" name="hr" value="1"> 1 hr.
                    <input type="radio" name="hr" value="2"> 2 hr.</p>  
            <label>Color:  
                <input type="color" list="color" name="color">
                <datalist id="color">
                    <option value="#AB2424"></option>
                    <option value="#BC7D3E"></option>
                    <option value="#369863"></option>
                    <option value="#17482B"></option>
                    <option value="#3477AD"></option>
                    <option value="#469892"></option>
                </datalist>
            </label>      
                <div class="btn-container">
                    <input type="submit" name="submit" class="btn-submit">
                    <a href="timetable.php"><button class="btn-cancel">Cancel</button></a>
                </div>
            </div>
        </form>
    </div>
</html>