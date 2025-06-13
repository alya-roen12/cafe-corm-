<html>
<head>
<title>Customer List</title>
</head>
<body>
<form>
<h3 align="center"><font color="#0000FF">Customer Details</font></h3>
<table align="center" border="1">
<tr>
<th><font color="#0000FF">Customer ID</font></th>
<th><font color="#0000FF">Email</font></th>
<th><font color="#0000FF">Username</font></th>
<th><font color="#0000FF">Phone Number</font></th>
<th><font color="#0000FF">Date of Birth</font></th>
<th colspan="2"><font color="#0000FF">Action</font></th>
</tr>

<?php
// Connect to database
$dbc = mysqli_connect("localhost", "root", "", "sales");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Query the staff table
$sql = "SELECT * FROM customer";
$result = mysqli_query($dbc, $sql);

// Display staff data
while($row = mysqli_fetch_assoc($result)) {
  Print '<tr>
    <td><font color="#0000FF">'.$row['CustID'].'</font></td>
    <td><font color="#0000FF">'.$row['CustEmail'].'</font></td>
    <td><font color="#0000FF">'.$row['CustUsername'].'</font></td>
    <td><font color="#0000FF">'.$row['CustPhoneNum'].'</font></td>
    <td><font color="#0000FF">'.$row['CustDOB'].'</font></td>
    <td>
      <a href="update_staff.php?staffid='.$row['CustID'].'" class="btn btn-warning" role="button">Update</a>
    </td>
    <td>
      <a href="delete_staff.php?staffid='.$row['CustID'].'" class="btn btn-danger" role="button">Delete</a>
    </td>
  </tr>';
}
?>
</table>
</form>
</body>
</html>
