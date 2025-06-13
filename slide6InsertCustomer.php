<?php
// 1. Get data from form
$email = $_POST['CustEmail'];
$username = $_POST['CustUsername'];
$password = $_POST['CustPassword'];
$phone = $_POST['CustPhoneNum'];
$dob = $_POST['CustDOB'];

// 2. Connect to the database
$dbc = mysqli_connect("localhost", "root", "", "sales");
if (mysqli_connect_errno()) {
  echo "Failed to connect: " . mysqli_connect_error();
  exit();
}

// 3. Insert data
$sql = "INSERT INTO customer (CustEmail, CustUsername, CustPassword, CustPhoneNum, CustDOB)
        VALUES ('$email', '$username', '$password', '$phone', '$dob')";

$result = mysqli_query($dbc, $sql);

if ($result) {
  mysqli_commit($dbc);
  echo "<script>alert('Sign up successfully');</script>";
  echo "<script>window.location.assign('slide6ListCustomerAccount.php');</script>";
} else {
  mysqli_rollback($dbc);
  echo "<script>alert('Sign up failed');</script>";
  echo "<script>window.location.assign('slide6FormCreateAccount.php');</script>";
}
?>
