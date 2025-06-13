<?php
$dbc = mysqli_connect("localhost", "root", "", "sales");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}

$staffID = $_GET['fStaffid'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['StaffName'];
    $phone = $_POST['StaffPhoneNum'];
    $house = $_POST['StaffHouseNum'];
    $postcode = $_POST['StaffPostcode'];
    $city = $_POST['StaffCity'];
    $state = $_POST['StaffState'];
    $position = $_POST['StaffPosition'];
    $dob = $_POST['StaffDOB'];

    $sql = "UPDATE staff SET 
        StaffName='$name',
        StaffPhoneNum='$phone',
        StaffHouseNum='$house',
        StaffPostcode='$postcode',
        StaffCity='$city',
        StaffState='$state',
        StaffPosition='$position',
        StaffDOB='$dob'
        WHERE StaffID='$staffID'";

    $result = mysqli_query($dbc, $sql);

    if ($result) {
        echo "<script>alert('Staff updated successfully'); window.location='slide10formstaff.php';</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }
} else {
    $sql = "SELECT * FROM staff WHERE StaffID='$staffID'";
    $result = mysqli_query($dbc, $sql);
    $staff = mysqli_fetch_assoc($result);
    if (!$staff) {
        echo "Staff not found.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Corm Cafe - Update Staff</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fffaf0;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #4B2E2E;
            padding: 10px 0;
            text-align: center;
        }

        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 28px;
        }

        .container {
            width: 60%;
            margin: 30px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #4B2E2E;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 12px;
            font-weight: bold;
        }

        input, select {
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            margin-top: 24px;
            padding: 12px;
            background-color: #4B2E2E;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #633a3a;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Corm Cafe - Update Staff</h1>
    </div>

    <div class="container">
        <h2>Update Staff Information</h2>
        <form method="POST">
            <label for="StaffName">Staff Name:</label>
            <input type="text" name="StaffName" id="StaffName" value="<?= htmlspecialchars($staff['StaffName']) ?>" required>

            <label for="StaffPhoneNum">Phone Number:</label>
            <input type="text" name="StaffPhoneNum" id="StaffPhoneNum" value="<?= htmlspecialchars($staff['StaffPhoneNum']) ?>" required>

            <label for="StaffHouseNum">House Number:</label>
            <input type="text" name="StaffHouseNum" id="StaffHouseNum" value="<?= htmlspecialchars($staff['StaffHouseNum']) ?>" required>

            <label for="StaffPostcode">Postcode:</label>
            <input type="text" name="StaffPostcode" id="StaffPostcode" value="<?= htmlspecialchars($staff['StaffPostcode']) ?>" required>

            <label for="StaffCity">City:</label>
            <input type="text" name="StaffCity" id="StaffCity" value="<?= htmlspecialchars($staff['StaffCity']) ?>" required>

            <label for="StaffState">State:</label>
            <select name="StaffState" id="StaffState" required>
                <?php
                $states = ['Kuala Lumpur', 'Selangor', 'Melaka', 'Johor', 'Perak'];
                foreach ($states as $state) {
                    $selected = $staff['StaffState'] === $state ? 'selected' : '';
                    echo "<option value=\"$state\" $selected>$state</option>";
                }
                ?>
            </select>

            <label for="StaffPosition">Position:</label>
            <select name="StaffPosition" id="StaffPosition" required>
                <?php
                $positions = ['Manager', 'Cashier', 'Barista', 'Chef'];
                foreach ($positions as $pos) {
                    $selected = $staff['StaffPosition'] === $pos ? 'selected' : '';
                    echo "<option value=\"$pos\" $selected>$pos</option>";
                }
                ?>
            </select>

            <label for="StaffDOB">Date of Birth:</label>
            <input type="date" name="StaffDOB" id="StaffDOB" value="<?= $staff['StaffDOB'] ?>" required>

            <button type="submit">Update Staff</button>
        </form>
    </div>
</body>
</html>
