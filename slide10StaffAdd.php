<?php

//assign data from staff form into variable
$Sid=$_POST['StaffID'];
$Sname=$_POST['StaffName'];
$Snum=$_POST['StaffPhoneNum'];
$Shouse=$_POST['StaffHouseNum'];
$Spostcode=$_POST['StaffPostcode'];
$Scity=$_POST['StaffCity'];
$Sstate=$_POST['StaffState'];
$Sposition=$_POST['StaffPosition'];
$Sdob=$_POST['StaffDOB'];

//connection to the server and database
$dbc=mysqli_connect("localhost","root","","sales");
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL:".mysqli_connect_error();
}

//SQL statement to insert data from form into table customer
$sql="insert into 'staff'('StaffID','StaffName','StaffPhoneNum','StaffPostcode','StaffCity', 'StaffState','StaffPosition', 'StaffDOB') values('$Sid', '$Sname', '$Snum', '$Shouse', '$Spostcode', '$Scity', '$Sstate', '$Sposition', '$Sdob');

$results=mysqli_query($dbc,$sql);

if($results)
{
	mysqli_commit($dbc);
	//display message box RECORD BEEN ADDED
	print'<script>alert("RECORD HAS BEEN ADDED");</script>';
	//go to slide10formstaff.php page
	print'<script>window.location.assign("slide10formstaff.php");</script';
}
else
{
	mysqli_rollback($dbc);
	//display error message box
	print'<script>alert("DATA IS INVALID, NO RECORD HAS BEEN ADDED");</script>';
	//go to slide10formstaff.php page
	print'<script>window.location.assign("slide10formstaff.php");</script';
}
?>