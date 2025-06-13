<?php
$dbc = mysqli_connect("localhost", "root", "", "corm");

if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM staff";
$result = mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Staff</title>
  <style>
    body {
      font-family: Calibri, sans-serif;
      background-color: #f3e7d3;
      padding: 40px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 16px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #6f2c10;
      color: white;
    }
    tr:hover {
      background-color: #f9f1e7;
    }
    a.button {
      padding: 8px 16px;
      background-color: black;
      color: white;
      text-decoration: none;
      border-radius: 20px;
      font-weight: bold;
    }
    a.button:hover {
      background-color: #333;
    }
  </style>
</head>
<body>

  <h2 style="text-align:center; color:#6f2c10;">Staff Records</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>House</th>
      <th>City</th>
      <th>Postcode</th>
      <th>State</th>
      <th>Position</th>
      <th>DOB</th>
      <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['StaffID']; ?></td>
        <td><?= $row['StaffName']; ?></td>
        <td><?= $row['StaffPhoneNum']; ?></td>
        <td><?= $row['StaffHouseNum']; ?></td>
        <td><?= $row['StaffCity']; ?></td>
        <td><?= $row['StaffPostcode']; ?></td>
        <td><?= $row['StaffState']; ?></td>
        <td><?= $row['StaffPosition']; ?></td>
        <td><?= $row['StaffDOB']; ?></td>
        <td>
          <a class="button" href='updatestaff.php?id=<?= $row['StaffID']; ?>'>Update</a>
          <a class="button" href='deletestaff.php?id=<?= $row['StaffID']; ?>' onclick="return confirm('Are you sure you want to delete this staff?');">Delete</a>
        </td>
      </tr>
    <?php } ?>

  </table>

</body>
</html>

<?php mysqli_close($dbc); ?>
