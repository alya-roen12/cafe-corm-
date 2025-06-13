<?php
// Check if the request method is POST and the StaffID is set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['StaffID'])) {
    // Connect to the database
    $dbc = mysqli_connect("localhost", "root", "", "corm");

    // Check connection
    if (!$dbc) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the staff ID
    $staff_id = mysqli_real_escape_string($dbc, $_POST['StaffID']);

    // Perform the delete query
    $query = "DELETE FROM staff WHERE StaffID = '$staff_id'";

    if (mysqli_query($dbc, $query)) {
        echo "<script>alert('Staff deleted successfully.'); window.location.href = 'viewstaff.php';</script>";
    } else {
        echo "<script>alert('Failed to delete staff: " . mysqli_error($dbc) . "'); window.location.href = 'viewstaff.php';</script>";
    }

    // Close the connection
    mysqli_close($dbc);
} else {
    // If accessed incorrectly
    echo "<script>alert('Invalid request.'); window.location.href = 'viewstaff.php';</script>";
}
?>
