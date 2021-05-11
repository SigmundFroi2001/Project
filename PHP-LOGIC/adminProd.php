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
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <?php
                if (!empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $_SESSION['id'] = $id;
                    $id_exists = true;
                    $con = mysqli_connect("localhost:3307", "root", "", "qcanedb") or die(mysqli_error($con)); //Connect to server
                    $sql = "Select * from products Where ProdID='$id'";
                    $query = mysqli_query($con, $sql); // SQL Query
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                            print "<tr>";
                            print '<td align="center">' . $row['ProdID'] . "</td>";
                            print '<td align="center">' . $row['prod_name'] . "</td>";
                            print '<td align="center">' . $row['stock_qty'] . "</td>";
                            print '<td align="center">PHP ' . $row['price'] . "</td>";
                            print "</tr></table><br/>";
                        }
                    } else {
                        $id_exists = false;
                    }
                }

                if ($id_exists) {
                    $prod_name = "";
                    $prod_qty = "";
                    $prod_price = "";
                    
                    print '<fieldset><legend><h3>Update Products</h3></legend>
                    <form action="adminProd.php" method="POST">
                        Product Name: <input type="text" name="prod-name" value="' . $prod_name . '"/><br/>
                        Product Qty: <input type="number" name="prod-qty" value="' . $prod_qty . '"/><br/>
                        Product Price: <input type="number" name="prod-price" value="' . $prod_price . '"/><br/>';

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
    $prod_name = ($_POST['prod-name']); 
    $prod_qty = ($_POST['prod-qty']);
    $prod_price = ($_POST['prod-price']);
    $id = $_SESSION['id'];
    mysqli_query($con, "UPDATE products SET prod_name='$prod_name', stock_qty='$prod_qty', price='$prod_price' WHERE ProdID='$id'");
    header("location: admin.php");
}
?>