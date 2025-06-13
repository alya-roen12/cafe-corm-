<!DOCTYPE html>
<html>
<head>
    <title>Staff Registration Form</title>
</head>
<body>
    <form name="staff" method="post" action="staffadd.php">
        <h2 align="center">Staff Registration</h2>
        <table border="1" align="center" cellpadding="8" cellspacing="0">
            <tr>
                <td>Staff ID</td>
                <td><input name="fStaffID" type="text" size="10" required /></td>
            </tr>
            <tr>
                <td>Staff Name</td>
                <td><input name="fStaffName" type="text" size="50" required /></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><input name="fStaffPhone" type="text" size="20" required /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="fStaffAddress" rows="4" cols="50" required></textarea></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input name="fStaffDOB" type="date" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnsubmit" value="Submit" />
                    <input type="reset" name="btnreset" value="Reset" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
