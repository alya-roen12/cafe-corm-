<html>
<head>
    <title>Staff List</title>
</head>
<body>
<form>
    <h3 align="center"><font color="#0000FF">Staff Details</font></h3>
    <table align="center" border="1">
        <tr>
            <th><font color="#0000FF">Staff ID</font></th>
            <th><font color="#0000FF">Name</font></th>
            <th colspan="2"><font color="#0000FF">Action</font></th>
        </tr>

<?php
// Connection to the server and database
$dbc = mysqli_connect("localhost", "root", "", "sales");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Fetch staff records
$sql = "SELECT * FROM staff";
$result = mysqli_query($dbc, $sql);

// Display each staff row
while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
        <td><font color="#0000FF">'.$row['StaffID'].'</font></td>
        <td><font color="#0000FF">'.$row['StaffName'].'</font></td>
        <td>
            <a href="fupdstaff.php?fid='.$row['StaffID'].'" class="btn btn-warning" role="button">Update</a>
        </td>
        <td>
            <a href="fdelstaff.php?fid='.$row['StaffID'].'" class="btn btn-danger" role="button">Delete</a>
        </td>
    </tr>';
}
?>
    </table>
</form>
</body>
</html>
