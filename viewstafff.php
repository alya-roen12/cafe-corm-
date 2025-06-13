<?php
// Connect to the database
$dbc = mysqli_connect("localhost", "root", "", "corm");
if (!$dbc) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get staff ID from URL
$staff_id = $_GET['StaffID'];

// Fetch staff data
$query = "SELECT * FROM staff WHERE StaffID = '$staff_id'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Staff</title>
  <style>
    body {
      font-family: Calibri, sans-serif;
      background-color: #f3e7d3;
      padding: 40px;
    }
    .form-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 20px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .form-container h2 {
      color: #6f2c10;
      margin-bottom: 30px;
      text-align: center;
    }
    .form-input, .form-select {
      width: 100%;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }
    .button-container {
      display: flex;
      justify-content: space-between;
    }
    button {
      padding: 12px 30px;
      font-size: 16px;
      border-radius: 30px;
      cursor: pointer;
      border: none;
      font-weight: bold;
      background-color: black;
      color: white;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>UPDATE STAFF</h2>
    <form method="post" action="updatestaffprocess.php">
      <input type="hidden" name="StaffID" value="<?= $row['StaffID']; ?>">
      <input class="form-input" type="text" name="StaffName" value="<?= $row['StaffName']; ?>" required>
      <input class="form-input" type="tel" name="StaffPhoneNum" value="<?= $row['staff_phone']; ?>" required>
      <input class="form-input" type="text" name="StaffHouseNum" value="<?= $row['house_number']; ?>" required>

      <input class="form-input" type="text" name="StaffCity" value="<?= $row['city']; ?>" required>
      <input class="form-input" type="text" name="StaffPostcode" value="<?= $row['postcode']; ?>" required>
      <input class="form-input" type="text" name="StaffState" value="<?= $row['state']; ?>" required>

      <select class="form-select" name="StaffPosition" required>
        <option value="<?= $row['StaffPosition']; ?>"><?= $row['StaffPosition']; ?></option>
        <option value="Manager">Manager</option>
        <option value="Supervisor">Supervisor</option>
        <option value="Barista">Barista</option>
        <option value="Chef">Chef</option>
        <option value="Cleaner">Cleaner</option>
        <option value="Cashier">Cashier</option>
      </select>

      <input class="form-input" type="date" name="StaffDOB" value="<?= $row['StaffDOB']; ?>" required>

      <div class="button-container">
        <button type="button" onclick="window.location.href='viewstaff.php'">Cancel</button>
        <button type="submit">Update</button>
      </div>
    </form>
  </div>
</body>
</html>
