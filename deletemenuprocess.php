<?php
// Check if the request method is POST and the MenuID is set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['MenuID'])) {
    // Connect to the database
    $dbc = mysqli_connect("localhost", "root", "", "corm");

    // Check connection
    if (!$dbc) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the menu ID
    $menu_id = mysqli_real_escape_string($dbc, $_POST['MenuID']);

    // Perform the delete query
    $query = "DELETE FROM menu WHERE MenuID = '$menu_id'";

    if (mysqli_query($dbc, $query)) {
        echo "<script>alert('menu deleted successfully.'); window.location.href = 'viewmenu.php';</script>";
    } else {
        echo "<script>alert('Failed to delete menu: " . mysqli_error($dbc) . "'); window.location.href = 'viewmenu.php';</script>";
    }

    // Close the connection
    mysqli_close($dbc);
} else {
    // If accessed incorrectly
    echo "<script>alert('Invalid request.'); window.location.href = 'viewmenu.php';</script>";
}
?>
