<?php
$dbc = mysqli_connect("localhost", "root", "", "corm");

if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM menu";
$result = mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Menu</title>
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

  <h2 style="text-align:center; color:#6f2c10;">Menu Records</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price (RM)</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['MenuID']; ?></td>
        <td><?= $row['MenuName']; ?></td>
        <td><?= number_format($row['MenuPrice'], 2); ?></td>
        <td><?= $row['MenuDesc']; ?></td>
        <td>
          <a class="button" href='updatemenu.php?id=<?= $row['MenuID']; ?>'>Update</a>
          <a class="button" href='deletemenu.php?id=<?= $row['MenuID']; ?>' onclick="return confirm('Are you sure you want to delete this menu item?');">Delete</a>
        </td>
      </tr>
    <?php } ?>

  </table>

</body>
</html>

<?php mysqli_close($dbc); ?>
