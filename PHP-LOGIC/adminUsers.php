<html>

<head>
    <title>Q-Cane Powdered Beverages</title>
    <link rel="stylesheet" href="CSS/design.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            background: black;
            color: white;
            font-family: 'quicksand';
        }
    </style>
</head>

<?php
session_start();
if ($_SESSION['user']) {
} else {
    header("location:login.php"); // redirects if user is not logged in
}
$id_exists = false;
?>

<body>
    <div id="admin-fields">
        <fieldset>
            <legend>
                <h2>Currently Selected</h2>
            </legend>
            <table border="1px" width="100%">
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Status</th>
                </tr>
                <?php
                if (!empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;
                    $id_exists = true;
                    $con = mysqli_connect("localhost:3307", "root", "", "qcanedb") or die(mysqli_error($con)); //Connect to server
                    $sql = "Select * from users Where UID='$id'";
                    $query = mysqli_query($con, $sql); // SQL Query
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            $status = "Admin";
                            if($row['status'] == 0)
                                $status = "Customer";
                            print "<tr>";
                            print '<td align="center">' . $row['UID'] . "</td>";
                            print '<td align="center">' . $row['username'] . "</td>";
                            print '<td align="center">' . $status . "</td>";
                            print "</tr></table><br/>";
                        }
                    } else {
                        $id_exists = false;
                    }
                }

                if ($id_exists) {
                    $user_status = "";
                    
                    print '<fieldset><legend><h3>Update User Status</h3></legend>
                    <form action="adminUsers.php" method="POST">
                        User Status: <input type="number" name="user-status" value="' . $user_status . '"/><br/>';

                    print '<legend><input class="submit-button" type="submit" value="Update"/></legend></form></fieldset>';
                } else {
                    print '<h2 align="center">There is no data to be edited.</h2>';
                }
                ?>
            </table>
        </fieldset>
    </div>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $con = mysqli_connect("sql113.epizy.com", "epiz_28587720", "Ft0s6tdLSzzjd", "epiz_28587720_qcanedb") or die(mysqli_error($con)); //Connect to server
    $user_status = ($_POST['user-status']);
    $id = $_SESSION['id'];
    mysqli_query($con, "UPDATE users SET status='$user_status' WHERE UID='$id'");
    header("location: admin.php");
}
?>