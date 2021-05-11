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
                    <th>Status</th>
                    <th>Date Subscribed</th>
                    <th>End Date</th>
                </tr>
                <?php
                if (!empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;
                    $id_exists = true;
                    $con = mysqli_connect("sql113.epizy.com", "epiz_28587720", "Ft0s6tdLSzzjd", "epiz_28587720_qcanedb") or die(mysqli_error($con)); //Connect to server
                    $sql = "Select * from subscriptions Where UID='$id'";
                    $query = mysqli_query($con, $sql); // SQL Query
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            $subscription = "Subscriber";
                            if($row['status'] == 0)
                                $subscription = "Non-Subscriber";
                            print "<tr>";
                            print '<td align="center">' . $row['UID'] . "</td>";
                            print '<td align="center">' . $subscription . "</td>";
                            print '<td align="center">' . $row['date_subscribed'] . "</td>";
                            print '<td align="center">' . $row['date_end'] . "</td>";
                            print "</tr></table><br/>";
                        }
                    } else {
                        $id_exists = false;
                    }
                }

                if ($id_exists) {
                    $sub_status = "";
                    
                    print '<fieldset><legend><h3>Update User Status</h3></legend>
                    <form action="adminSubs.php" method="POST">
                        Subscription Status: <input type="number" name="sub-status" value="' . $sub_status . '"/><br/>';
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
    $sub_status = ($_POST['sub-status']);
    $id = $_SESSION['id'];
    mysqli_query($con, "UPDATE subscriptions SET status='$sub_status',date_subscribed=NULL,date_end=NULL WHERE UID='$id'");
    if($sub_status > 0){
        $today = date('Y-m-d H:i:s');
        $date = date('Y-m-d', strtotime('+1 month', strtotime($today)));
        mysqli_query($con, "UPDATE subscriptions SET date_subscribed='$today',date_end='$date' WHERE UID='$id'");
    }
    header("location: admin.php");
}
?>