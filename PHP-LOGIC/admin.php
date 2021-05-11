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
if ($_SESSION['user']) { //checks if user is logged in
    $username = $_SESSION['user'];
	$db_name = "epiz_28587720_qcanedb";  
    $db_username = "epiz_28587720";    
    $db_pass = "Ft0s6tdLSzzjd";    
    $db_host = "sql113.epizy.com";
    //$db_name = "qcanedb";
    //$db_username = "root";
    //$db_pass = "";
    //$db_host = "localhost:3307";
    $con = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die('Error: ' . mysqli_error($con)); //Connect to server
    $query = "SELECT * from users WHERE username='$username'";
    $results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
    $exists = mysqli_num_rows($results); //Checks if username exists
    $table_users = "";
    $table_status = "";

    if ($results != "" && $exists != 1) { //IF there are no returning rows or no existing username
        print '<script>alert("Incorrect Username!");</script>'; //Prompts the user 
        print '<script>window.location.assign("../PHP/login.php");</script>'; // redirects to login.php  
    } else {
        while ($row = mysqli_fetch_assoc($results)) //display all rows from query
        {
            $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished  
            $table_status = $row['status']; // the first status row is passed on to $table_users, and so on until the query is finished 
        }
        if ($username == $table_users) // checks if there are any matching fields
        {
            if ($table_status != 1) {
                $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                header("location: ../PHP/main.php"); // redirects the user to the authenticated home page                                 
            }
        } else {
            print '<script>window.location.assign("../PHP/main.php");</script>'; // redirects to login.php 
        }
    }
} else {
    header("location:../PHP/login.php"); // redirects if user is not logged in
}
$user = $_SESSION['user'];
$id_exists = false;
?>

<body>
    <!-- Insert Admin functions here -->
    <div id="admin-fields">
        <center>
            <h2>Welcome Admin!</h2>
        </center>
        <fieldset>
            <legend>
                <h2>Products</h2>
            </legend>
            <table border="1px" width="100%">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
                <?php
                $con = mysqli_connect("sql113.epizy.com", "epiz_28587720", "Ft0s6tdLSzzjd", "epiz_28587720_qcanedb") or die(mysqli_error($con)); //Connect to server
                $query = mysqli_query($con, "Select * from products"); // SQL Query
                while ($row = mysqli_fetch_array($query)) {
                    print "<tr>";
                    print '<td align="center">' . $row['ProdID'] . "</td>";
                    print '<td align="center">' . $row['prod_name'] . "</td>";
                    print '<td align="center">' . $row['stock_qty'] . "</td>";
                    print '<td align="center">PHP ' . $row['price'] . "</td>";
                    print '<td align="center" class="edit-row"><a href="adminProd.php?id=' . $row['ProdID'] . '">Edit</a> </td>';
                    print "</tr>";
                }
                ?>
            </table>
        </fieldset>

        <fieldset>
            <legend>
                <h2>Users</h2>
            </legend>
            <table border="1px" width="100%">
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                <?php
                $con = mysqli_connect("localhost:3307", "root", "", "qcanedb") or die(mysqli_error($con)); //Connect to server
                $query = mysqli_query($con, "Select * from users"); // SQL Query
                while ($row = mysqli_fetch_array($query)) {
                    $status = "Admin";
                    if($row['status'] == 0)
                        $status = "Customer";
                    print "<tr>";
                    print '<td align="center">' . $row['UID'] . "</td>";
                    print '<td align="center">' . $row['username'] . "</td>";
                    print '<td align="center">' . $status . "</td>";
                    print '<td align="center" class="edit-row"><a href="adminUsers.php?id=' . $row['UID'] . '">Edit</a> </td>';
                    print "</tr>";
                }
                ?>
            </table>
        </fieldset>

        <fieldset>
            <legend>
                <h2>Subscriptions</h2>
            </legend>
            <table border="1px" width="100%">
                <tr>
                    <th>User ID</th>
                    <th>Status</th>
                    <th>Date Subscribed</th>
                    <th>End Date</th>
                    <th>Edit</th>
                </tr>
                <?php
                $con = mysqli_connect("localhost:3307", "root", "", "qcanedb") or die(mysqli_error($con)); //Connect to server
                $query = mysqli_query($con, "Select * from subscriptions"); // SQL Query
                while ($row = mysqli_fetch_array($query)) {
                    $subscription = "Subscriber";
                    if($row['status'] == 0)
                        $subscription = "Non-Subscriber";
                    print "<tr>";
                    print '<td align="center">' . $row['UID'] . "</td>";
                    print '<td align="center">' . $subscription . "</td>";
                    print '<td align="center">' . $row['date_subscribed'] . "</td>";
                    print '<td align="center">' . $row['date_end'] . "</td>";
                    print '<td align="center" class="edit-row"><a href="adminSubs.php?id=' . $row['UID'] . '">Edit</a> </td>';
                    print "</tr>";
                }
                ?>
            </table>
        </fieldset>

    </div>
</body>
</html>