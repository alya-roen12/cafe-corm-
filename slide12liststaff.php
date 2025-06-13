<html>
<head>
<title>List of Staff</title>
</head>
<body>
<form>

<h3 align="center">
<font color="#0000FF">Staff Details</font></h3>
<table align="center" border="1">
<tr>
	<th><font color="#0000FF">Staff ID</font></th>
	<th><font color="#0000FF">Staff Name</font></th>
	<th><font color="#0000FF">Staff Phone Number</font></th>
	<th><font color="#0000FF">Staff House Number</font></th>
	<th><font color="#0000FF">Staff Postcode</font></th>
	<th><font color="#0000FF">Staff City</font></th>
	<th><font color="#0000FF">Staff State</font></th>
	<th><font color="#0000FF">Staff Position</font></th>
	<th><font color="#0000FF">Staff DOB</font></th>
	<th colspan="2"><font color="#0000FF">Action</font></th>
</tr>

<?php
//connection to the server and database
$dbc=mysqli_connect("localhost","root","","sales");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL:".mysqli_connect_error();
}
$sql="select * from staff";
$results=mysqli_query($dbc,$sql);
while($row=mysqli_fetch_assoc($result))
{
	Print'<tr>
		<td><font color="#0000FF">'.$row['StaffID'].'</font></td>
		<td><font color="#0000FF">'.$row['StaffName'].'</font></td>
		<td><font color="#0000FF">'.$row['StaffPhoneNum'].'</font></td>
		<td><font color="#0000FF">'.$row['StaffPostcode'].'</font></td>
		<td><font color="#0000FF">'.$row['StaffCity'].'</font></td>
		<td><font color="#0000FF">'.$row['StaffState'].'</font></td>
		<td><font color="#0000FF">'.$row['StaffPosition'].'</font></td>
		<td><font color="#0000FF">'.$row['StaffDOB'].'</font></td>
		<td colspan="2"><font color="#0000FF">Action</font></td>
		
		<td>
		<a href="slide11UpdateStaff.php?fStaffid='.$row['StaffID'].' &"class="btn btw-warning" role="button">Update</a>
		</td>

		<td>
		<a href="slide11DeleteStaff.php?fStaffid='.$row['StaffID'].' &"class="btn btw-warning" role="button">Delete</a>
		</td>
	
	</tr>';
}
?>
</table>
</form>
</body>
</html>


