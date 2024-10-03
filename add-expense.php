<?php

    include('config/db_connect.php');

	$name = $amount = $type = '';
	$errors = array('name' => '', 'amount' => '', 'type' => '');

	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} else{
			$name = $_POST['name'];
		}

		// check title
		if(empty($_POST['amount'])){
			$errors['amount'] = 'An amount is required';
		} else{
			$amount = $_POST['amount'];
			
		}

		// check ingredients
		if(empty($_POST['type'])){
			$errors['type'] = 'At least one type is required';
		} else{
			$type = $_POST['type'];
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$amount = mysqli_real_escape_string($conn, $_POST['amount']);
			$type = mysqli_real_escape_string($conn, $_POST['type']);

			// create sql
			$sql = "INSERT INTO expenses(name,amount,type) VALUES('$name','$amount','$type')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: expense.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			
		}

	} // end POST check

?>


<html>
    <head>
		<!-- font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

		<!-- css -->
        <link rel="stylesheet" href="css/expense.css">
		<link rel="stylesheet" href="css/main.css">
    </head>


    <body>
		<div class="form-add-expense-container">
			
			<div class="add-expense-head">
				<p>Add Expense</p>
			</div>

			<form class="form-add-expense" action="add-expense.php" method="POST">
					<div class="add-expense-container">

						<div class="int">
							<p class="input-box-text">Name</p>
							<input type="text" name="name" class="int-box">
						</div>

						<div class="int">
							<p class="input-box-text">Amount</p>
							<input type="text" name="amount" class="int-box">
						</div>

						<div class="int">
							<p class="input-box-text">Type</p>
							<select name="type">
								<option value=""></option>
								<option value="1">Food</option>
								<option value="2">Beverage</option>
								<option value="3">Entertain</option>
								<option value="4">Laundry</option>
								<option value="5">Utilities</option>
							</select>
						</div>

						<div class="button-container">
							<input type="submit" name="submit">
						</div>
					</div>
			</form>
		</div>
        
    </body>
        
</html>

<!-- http://localhost/954142/group-project/timetablev.3/add-expense.php -->