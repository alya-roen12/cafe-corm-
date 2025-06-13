<?php
// Step 1: Assign data from staff form into variables
$email = $_POST['CustEmail'];
$username = $_POST['CustUsername'];
$password = $_POST['CustPassword'];
$phone = $_POST['CustPhoneNum'];
$dob = $_POST['CustDOB'];

// Step 2: Connect to the database
$dbc = mysqli_connect("localhost", "root", "", "cormcafe");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Step 3: Insert the data into the database
$sql = "INSERT INTO customer (CustUsername, CustPassword, CustPhoneNum, CustDOB) VALUES ('$email', '$username', '$password', '$phone', '$dob')";
$result = mysqli_query($dbc, $sql);

if ($result) {
    mysqli_commit($dbc);
    echo '<script>alert("Sign up successfully!");</script>';
    echo '<script>window.location.href = "display_staff.php";</script>';
} else {
    mysqli_rollback($dbc);
    echo '<script>alert("Sign up failed. Please try again.");</script>';
    echo '<script>window.location.href = "createaccount.html";</script>';
}
?>
