<?php
$dbc = mysqli_connect("localhost", "root", "", "corm") or die("Connection failed");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Sid = $_POST['StaffID'];
    $Sname = $_POST['StaffName'];
    $Snum = $_POST['StaffPhoneNum'];
    $Shouse = $_POST['StaffHouseNum'];
    $Spostcode = $_POST['StaffPostcode'];
    $Scity = $_POST['StaffCity'];
    $Sstate = $_POST['StaffState'];
    $Sposition = $_POST['StaffPosition'];
    $Sdob = $_POST['StaffDOB'];

    $sql = "INSERT INTO `staff` 
        (`StaffID`, `StaffName`, `StaffPhoneNum`, `StaffHouseNum`, `StaffPostcode`, `StaffCity`, `StaffState`, `StaffPosition`, `StaffDOB`) 
        VALUES 
        ('$Sid', '$Sname', '$Snum', '$Shouse', '$Spostcode', '$Scity', '$Sstate', '$Sposition', '$Sdob')";

    mysqli_query($dbc, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Corm Cafe - Create Account</title>
    <link rel="stylesheet" href="slide10formstaff.css">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="slide10formstaff.php">
            <h2>Create Staff Account</h2>
            <input name="StaffID" class="form-input" type="text" placeholder="Staff ID" required />
            <input name="StaffName" class="form-input" type="text" placeholder="Staff Name" required />
            <input name="StaffPhoneNum" class="form-input" type="tel" placeholder="Phone Number" required />
            <input name="StaffHouseNum" class="form-input" type="text" placeholder="House Number" required />

            <select name="StaffCity" class="form-select" id="city" required onchange="updatePostcode()">
                <option value="" disabled selected>Select City</option>
                <option value="Subang Jaya">Subang Jaya</option>
                <option value="Klang">Klang</option>
                <option value="Shah Alam">Shah Alam</option>
            </select>

            <select name="StaffPostcode" class="form-select" id="postcode" required>
                <option value="" disabled selected>Select Postcode</option>
            </select>

            <select name="StaffState" class="form-select" required>
                <option value="" disabled selected>Select State</option>
                <option value="Selangor">Selangor</option>
                <option value="Kuala Lumpur">Kuala Lumpur</option>
                <option value="Putrajaya">Putrajaya</option>
            </select>

            <select name="StaffPosition" class="form-select" required>
                <option value="" disabled selected>Select Position</option>
                <option value="Barista">Barista</option>
                <option value="Chef">Chef</option>
                <option value="Manager">Manager</option>
                <option value="Waiter">Waiter</option>
            </select>

            <input name="StaffDOB" class="form-input" type="date" required />
            <button type="submit" class="form-button">Submit</button>
        </form>
    </div>

    <br><br><hr><br>

    <h2>Staff List</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>StaffID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>House Number</th>
            <th>Postcode</th>
            <th>City</th>
            <th>State</th>
            <th>Position</th>
            <th>DOB</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        $sql = "SELECT * FROM staff";
        $results = mysqli_query($dbc, $sql);
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<tr>";
            echo "<td>{$row['StaffID']}</td>";
            echo "<td>{$row['StaffName']}</td>";
            echo "<td>{$row['StaffPhoneNum']}</td>";
            echo "<td>{$row['StaffHouseNum']}</td>";
            echo "<td>{$row['StaffPostcode']}</td>";
            echo "<td>{$row['StaffCity']}</td>";
            echo "<td>{$row['StaffState']}</td>";
            echo "<td>{$row['StaffPosition']}</td>";
            echo "<td>{$row['StaffDOB']}</td>";
            echo "<td><a href='slide11UpdateStaff.php?fStaffid={$row['StaffID']}' class='btn btn-warning'>Update</a></td>";
            echo "<td><a href='slide12DeleteStaff.php?fStaffid={$row['StaffID']}' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        function updatePostcode() {
            var city = document.getElementById("city").value;
            var postcode = document.getElementById("postcode");
            postcode.innerHTML = '<option value="" disabled selected>Select Postcode</option>';

            if (city === "Subang Jaya") {
                postcode.innerHTML += "<option value='47600'>47600</option><option value='47610'>47610</option><option value='47620'>47620</option>";
            } else if (city === "Klang") {
                postcode.innerHTML += "<option value='41000'>41000</option><option value='41200'>41200</option><option value='41400'>41400</option>";
            } else if (city === "Shah Alam") {
                postcode.innerHTML += "<option value='40000'>40000</option><option value='40100'>40100</option><option value='40300'>40300</option>";
            }
        }
    </script>
</body>
</html>
