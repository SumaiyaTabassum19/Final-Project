<?php
    $name = $_POST['name'];
	$email = $_POST['email'];
    $password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
// Database connection
	$conn = new mysqli('localhost','root','','health');
		if($conn->connect_error){
			echo "$con->connect_error";
			die("Connection Failed : ". $conn->connect_error);
	}else{
	$stmt = $conn->prepare("insert into backend(name, email, password, confirmpassword) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name , $email ,$password , $confirmpassword);
		$execval = $stmt->execute();
		echo "Registration Successfull";
		$stmt->close();
		$conn->close();
	}
?>