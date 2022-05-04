<?php
include_once 'connect_db.php';
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$position = $_POST['position'];
	switch ($position) {
		case 'Admin':
			$result = mysqli_query($con, "SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
			$row = mysqli_fetch_array($result);
			if ($row > 0) {
				session_start();
				$_SESSION['admin_id'] = $row[0];
				$_SESSION['username'] = $row[1];
				header("location:http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/admin.php");
			} else {
				$message = "<font color=red><br><center>Invalid login Try Again</center></font>";
			}
			break;
		case 'Pharmacist':
			$result = mysqli_query($con, "SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
			$row = mysqli_fetch_array($result);
			if ($row > 0) {
				session_start();
				$_SESSION['pharmacist_id'] = $row[0];
				$_SESSION['first_name'] = $row[1];
				$_SESSION['last_name'] = $row[2];
				$_SESSION['staff_id'] = $row[3];
				$_SESSION['username'] = $row[4];
				header("location:http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/pharmacist.php");
			} else {
				$message = "<font color=red><br><center>Invalid login Try Again</center></font>";
			}
			break;
		case 'Cashier':
			$result = mysqli_query($con, "SELECT cashier_id, first_name,last_name,staff_id,username FROM cashier WHERE username='$username' AND password='$password'");
			$row = mysqli_fetch_array($result);
			if ($row > 0) {
				session_start();
				$_SESSION['cashier_id'] = $row[0];
				$_SESSION['first_name'] = $row[1];
				$_SESSION['last_name'] = $row[2];
				$_SESSION['staff_id'] = $row[3];
				$_SESSION['username'] = $row[4];
				header("location:http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/cashier.php");
			} else {
				$message = "<font color=red><br><center>Invalid login Try Again</center></font>";
			}
			break;
		case 'Manager':
			$result = mysqli_query($con, "SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
			$row = mysqli_fetch_array($result);
			if ($row > 0) {
				session_start();
				$_SESSION['manager_id'] = $row[0];
				$_SESSION['first_name'] = $row[1];
				$_SESSION['last_name'] = $row[2];
				$_SESSION['staff_id'] = $row[3];
				$_SESSION['username'] = $row[4];
				header("location:http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/manager.php");
			} else {
				$message = "<font color=red><br><center>Invalid login Try Again</center></font>";
			}
			break;
	}
}
echo <<<LOGIN

<!DOCTYPE html>
<html>
<head>
<title>Pharmacy Management System</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="jumbotron text-center bg-dark bg-opacity-60 text-light pb-3 pt-3">
	<h1>Pharmacy Management System</h1>
	<p>This is a simple pharmacy management system</p>
</div>


<div class="container pb-4">
	<div class="row pt-4">

		<div class="col-md-4"></div>
		<div class="col-md-4" align="center">
			<img src="images/ulg.png">
			<!--<h1><center>Login here</center></h1>-->
			$message
			<form method="post" action="index.php" align="center" class="pt-4">
			
				<p><input type="text" name="username" value="" placeholder="Username" class="form-control" required></p>
				<p><input type="password" name="password" value="" placeholder="Password" class="form-control"  required></p>
				<p><select name="position" class="form-control">
				<option>Login as</option>
					<option>Admin</option>
					<option>Manager</option>
					<option>Pharmacist</option>
					<option>Cashier</option>
					
					</select></p>

				<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
					
			</form>
		</div>
		<div class="col-md-4"></div>

	</div>
</div>

<div class="container-fluid">
	<div class="row bg-dark bg-opacity-60 text-light pb-3 pt-3">
		<div class="col-md-12">
			<center>
				<p class="text-center">&copy; Copyright 2022</p>
			</center>
		</div>
	</div>
</div>


</body>
</html>
LOGIN;
