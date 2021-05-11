<html>

<head>
    <title>Q-Cane Order</title>
    <link href="../CSS/design.css" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<?php
session_start(); //starts the session
if ($_SESSION['user']) { //checks if user is logged in
} else {
    header("location:login.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>

<?php
session_start();
$iq1 = $_POST['itemq1'];
$iq2 = $_POST['itemq2'];
$iq3 = $_POST['itemq3'];
$iq4 = $_POST['itemq4']; // 
$pay_mode = $_POST['paymeth'];

//Getting Item Quantity
$itemQuants = array();
array_push($itemQuants, $iq1, $iq2, $iq3, $iq4);


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

//Getting UID
$query = "SELECT * from users WHERE username = '$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$uid = $row['UID'];

//Getting Date
$date = date("Y.m.d");

//Instantiate Order History 
$query = "SELECT * from order_hist";
$result = mysqli_query($con, $query);
$randomOid = rand(1000000000, 9999999999);
mysqli_query($con, "INSERT INTO order_hist (OrderID, UID ,Date )
                        VALUES ('$randomOid','$uid', '$date')");

//Getting Order ID
$oid = $randomOid;

//Getting Product ID
$query = "SELECT * from products";
$result = mysqli_query($con, $query);
$pid = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($pid, $row['ProdID']);
}

//Getting Product Price
$query = "SELECT * from products";
$result = mysqli_query($con, $query);
$prc = array();
$k = 0;
while ($row = mysqli_fetch_array($result)) {
    array_push($prc, ($row['price'] * $itemQuants[$k]));
    $k++;
}



$query = "SELECT * from transaction";
$result = mysqli_query($con, $query);

$i = 0;
foreach ($itemQuants as $q) {
    if ($q > 0) {
        mysqli_query($con, "INSERT INTO transaction (OrderID,UID,ProdID,date,qty,amt_to_pay,payment_mode) 
                                VALUES ('$oid','$uid','$pid[$i]','$date','$q','$prc[$i]','$pay_mode')");
        $i++;
    } else {
        $i++;
    }
}

/*  
    - OrderID [PK] - int
    - UID [FK] - int
    - ProdID [FK] - int
    - date - date
    - qty - int
    - amt_to_pay - double
    - amt_paid - double
    */
?>

<body>
    <div class="navContainer">
        <div class="brand">
            <a href="main.php"><img src="https://media.discordapp.net/attachments/816131907083436072/841234993413095444/Q-Cane_Logo.png" alt="Logo" style="margin-top: -10px;width:125px;height:125px;"></a>
        </div>
        <nav>
            <ul>
                <li class="link"><a href="main.php" style="text-decoration: underline;">Home</a></li>
                <li class="link"><a href="products.php">Products</a></li>
                <li class="link"><a href="subscription.php">Subscription</a></li>
                <li class="link"><a href="check-out.php">Purchase</a></li>
                <li class="link"><a href="faq.php">FAQs</a></li>
                <?php
                print '<li class="link">' . $user . '</li>';
                print '<li class="link"><a href="../PHP-LOGIC/logout.php">Logout</a></li>'
                ?>
            </ul>
        </nav>
    </div>

    <div class="x">
        <table>
            <?php
            $con = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die('Error: ' . mysqli_error($con)); //Connect to server
            $query = mysqli_query($con, "Select * from transaction WHERE OrderID in ('$oid')"); // SQL Query
            $row = mysqli_fetch_array($query);
            //print $row[0];
            print "<tr>";
            print '<td> Your Order ID is: ' . $row[0] . '</td>';
            print '<td>' . $row[1] . '</td>';
            print '<td>' . $row[2] . '</td>';
            print '<td>' . $row[3] . '</td>';
            print '<td>' . $row[4] . '</td>';
            print '<td>' . $row[5] . '</td>';
            print '<td>' . $row[6] . '</td>';
            print "</tr>";

            //$row = mysqli_fetch_array($query);
            //Print '<div align="center"> Your Order ID is: '. $row['OrderID'] . "</div>";
            ?>
        </table>
    </div>
</body>

</html>