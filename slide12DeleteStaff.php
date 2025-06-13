<?php
// Connect to database
$dbc = mysqli_connect("localhost", "root", "", "sales");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

// Get StaffID from URL
$staffID = $_GET['fStaffid'] ?? '';

if ($staffID) {
    $sql = "DELETE FROM staff WHERE StaffID='$staffID'";
    $result = mysqli_query($dbc, $sql);

    if ($result) {
        echo "<script>alert('Staff record deleted successfully'); window.location='slide10formstaff.php';</script>";
    } else {
        echo "<script>alert('Failed to delete staff record'); window.location='slide10formstaff.php';</script>";
    }
} else {
    echo "<script>alert('No Staff ID provided'); window.location='slide10formstaff.php';</script>";
}
?>
