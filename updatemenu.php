<?php
$dbc = mysqli_connect("localhost", "root", "", "corm");

if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Invalid menu ID.";
    exit;
}

// Handle update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['MenuName'];
    $price = $_POST['MenuPrice'];
    $desc = $_POST['MenuDescription'];

    $update = "UPDATE menu SET 
        MenuName = '$name',
        MenuPrice = '$price',
        MenuDescription = '$desc'
        WHERE MenuID = '$id'";

    if (mysqli_query($dbc, $update)) {
        echo "<script>alert('Menu updated successfully'); window.location.href='viewmenu.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($dbc);
    }
}

// Get current menu data
$result = mysqli_query($dbc, "SELECT * FROM menu WHERE MenuID = '$id'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Menu item not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Update Menu</title>
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
    input, textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    textarea {
      resize: vertical;
      min-height: 100px;
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
    <h2>Update Menu Item</h2>
    <input type="text" name="MenuName" value="<?= $data['MenuName']; ?>" placeholder="Menu Name" required />
    <input type="number" step="0.01" name="MenuPrice" value="<?= $data['MenuPrice']; ?>" placeholder="Price (RM)" required />
    <textarea name="MenuDescription" placeholder="Menu Description" required><?= $data['MenuDescription']; ?></textarea>
    <button type="submit">Update Menu</button>

    <div style="text-align:center; margin-top:20px;">
      <a href="viewmenu.php" style="text-decoration:none; color:#6f2c10; font-weight:bold;">← Back to Menu List</a>
    </div>
  </form>

</body>
</html>

<?php mysqli_close($dbc); ?>
