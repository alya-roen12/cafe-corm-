<?php
$dbc = mysqli_connect("localhost", "root", "", "corm");

if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Invalid staff ID.";
    exit;
}

// Handle update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staff_name = $_POST['StaffName'];
    $staff_phone = $_POST['StaffPhoneNum'];
    $house_number = $_POST['StaffHouseNum'];
    $city = $_POST['StaffCity'];
    $postcode = $_POST['StaffPostcode'];
    $state = $_POST['StaffState'];
    $position = $_POST['StaffPosition'];
    $dob = $_POST['StaffDOB'];

    $update = "UPDATE staff SET 
        StaffName = '$staff_name',
        StaffPhoneNum = '$staff_phone',
        StaffHouseNum = '$house_number',
        StaffCity = '$city',
        StaffPostcode = '$postcode',
        StaffState = '$state',
        StaffPosition = '$position',
        StaffDOB = '$dob'
        WHERE StaffID = '$id'";

    if (mysqli_query($dbc, $update)) {
        echo "<script>alert('Staff updated successfully'); window.location.href='viewstaff.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($dbc);
    }
}

// Get current staff data
$result = mysqli_query($dbc, "SELECT * FROM staff WHERE StaffID = '$id'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Staff not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Update Staff</title>
  <style>
    body {
      font-family: Calibri, sans-serif;
      background-color: #f3e7d3;
      padding: 40px;
    }
    form {
      background: white;
      padding: 30px;
      border-radius: 15px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    input, select {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    button {
      padding: 12px 25px;
      background-color: black;
      color: white;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
    }
    h2 {
      text-align: center;
      color: #6f2c10;
      margin-bottom: 25px;
    }
  </style>
</head>
<body>

  <form method="POST">
    <h2>Update Staff</h2>
    <input type="text" name="StaffName" value="<?= $data['StaffName']; ?>" placeholder="Staff Name" required />
    <input type="text" name="StaffPhoneNum" value="<?= $data['StaffPhoneNum']; ?>" placeholder="Phone Number" required />
    <input type="text" name="StaffHouseNum" value="<?= $data['StaffHouseNum']; ?>" placeholder="House Number" required />
    <input type="text" name="StaffCity" value="<?= $data['StaffCity']; ?>" placeholder="City" required />
    <input type="text" name="StaffPostcode" value="<?= $data['StaffPostcode']; ?>" placeholder="Postcode" required />
    <input type="text" name="StaffState" value="<?= $data['StaffState']; ?>" placeholder="State" required />
    <select name="StaffPosition" required>
      <option value="">Select Position</option>
      <option value="Barista" <?= $data['StaffPosition'] == 'Barista' ? 'selected' : '' ?>>Barista</option>
      <option value="Chef" <?= $data['StaffPosition'] == 'Chef' ? 'selected' : '' ?>>Chef</option>
      <option value="Waiter" <?= $data['StaffPosition'] == 'Waiter' ? 'selected' : '' ?>>Waiter</option>
      <option value="Manager" <?= $data['StaffPosition'] == 'Manager' ? 'selected' : '' ?>>Manager</option>
    </select>
    <input type="date" name="StaffDOB" value="<?= $data['StaffDOB']; ?>" required />
    <button type="submit">Update Staff</button>

    <div style="text-align:center; margin-top:20px;">
      <a href="viewstaff.php" style="text-decoration:none; color:#6f2c10; font-weight:bold;">← Back to Staff List</a>
    </div>
  </form>

</body>
</html>

<?php mysqli_close($dbc); ?>
