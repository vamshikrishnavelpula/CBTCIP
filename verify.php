<?php
	session_start();
	include("project.php"); 
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if (!empty($email) && !empty($password)) {
			$query = " INSERT INTO email (name,email,password) VALUES ('$name','$email','$password') ";
			mysqli_query($con, $query);
			echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
			header("Location:login.php");
		}
		else {
			echo "<script type='text/javascript'> alert('Please Enter valid information')</script>";
		}
	}
?>
