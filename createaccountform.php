<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "corm");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form inputs
$email = $_POST['CustEmail'];
$username = $_POST['CustUsername'];
$password = password_hash($_POST['CustPassword'], PASSWORD_DEFAULT);
$phone = $_POST['CustPhoneNum'];
$dob = $_POST['CustDOB'];

// Insert into customer table
$sql = "INSERT INTO customer (CustEmail, CustUsername, CustPassword, CustPhoneNum, CustDOB) 
        VALUES ('$email', '$username', '$password', '$phone', '$dob')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Account created successfully!'); window.location.href='createaccountform.html';</script>";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
