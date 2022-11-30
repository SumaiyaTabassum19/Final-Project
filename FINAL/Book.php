<?php
	$name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $message = $_POST['message'];
	// Database connection
	$conn = new mysqli('localhost','root','','health');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into book(name,number,email, date, message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss", $name , $number ,$email , $date, $message);
		$execval = $stmt->execute();
		echo "Booked...";
		$stmt->close();
		$conn->close();
	}
?>