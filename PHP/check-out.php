<html>

<head>
    <title>Q-Cane Checkout</title>
    <link href="../CSS/design.css" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<?php
    session_start(); //starts the session
    if($_SESSION['user']){ //checks if user is logged in
    }
    else{
    header("location:login.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
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
					<li class="link"><a href="subscription.php">Purchase</a></li>
					<li class="link"><a href="check-out.php">Checkout</a></li>
					<li class="link"><a href="faq.php">FAQs</a></li>
                    <?php
                        print '<li class="link">'. $user .'</li>';
                        print '<li class="link"><a href="../PHP-LOGIC/logout.php">Logout</a></li>'
                    ?>
				</ul>
			</nav>
		</div>


        <div class="center">
            <h1>Product Purchase</h1>
            <h2>Products</h2>
        </div>
        <form action='../PHP-LOGIC/orderOut.php' method='post' align=center>
            <table>
                <tr>
                    <td style="padding-right:50px;"><h2>Q-Cane Powdered Coffee</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841270925446086666/powedered_coffee.png?width=702&height=702" style="width: 250; height:250px;" /><br />66.99 STD</td>
                    <td style="padding-right:50px;"><h2>Q-Cane Powdered Tea Leaves</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841280881209376779/powedered_tea.png?width=702&height=702" style="width: 250; height:250px;" /><br />66.99 STD</td>
                    <td style="padding-right:50px;"><h2>Q-Cane Powdered Ice Tea</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841270925446086666/powedered_coffee.png?width=702&height=702" style="width: 250; height:250px;" /><br />66.99 STD</td>
                    <td style="padding-right:50px;"><h2>Q-Cane Powdered Chocolate</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841270925446086666/powedered_coffee.png?width=702&height=702" style="width: 250; height:250px;" /><br />66.99 STD</td>
                </tr>
                <tr>
                    <td>Quantity<br/>
                        <select name="itemq1">
                            <option value=0 >0</option>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                        </select>
                    </td>
                    <td>Quantity<br/>
                        <select name="itemq2">
                            <option value=0 >0</option>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                        </select>
                    </td>
                    <td>Quantity<br/>
                        <select name="itemq3">
                            <option value=0 >0</option>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                        </select>
                    </td>
                    <td>Quantity<br/>
                        <select name="itemq4">
                            <option value=0 >0</option>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                        </select>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Payment Method: <br /><br />
                        <input type="radio" name="paymeth" value="visa">
                        <label for="VISA">VISA</label>
                        <input type="radio" name="paymeth" value="mstcard">
                        <label for="Master Card">Master Card</label>
                        <input type="radio" name="paymeth" value="gcash" checked>
                        <label for="GCash">GCash</label>
                    </td>
                </tr>
            </table>
            <div class="center">
                <input class='sendbutton' type='submit' value='SUBMIT' style="background-color: #D21034;color: white;padding-top: 12px;padding-bottom: 12px;border: none;text-transform: uppercase;font-size: 11px;position: relative;z-index: 500;letter-spacing: 0.06em;text-align: center;cursor: pointer;width: 25%;transition: 0.8s all ease;margin-bottom: 25px;">
            </div>
        </form>
    <!--<h2 align="center">My Cart</h2>
    <table border="1px" width="100%">
        <tr>
            <th>Id</th>
            <th>Details</th>
            <th>Quantity</th>
            <th>Delete</th>
        </tr>

        < ?php
        session_start();
        $db_name = "qcanedb";
        $db_username = "root";
        $db_pass = "";
        $db_host = "localhost:3307";
        $con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die(mysqli_error(mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name"))); //Connect to server
        $query = mysqli_query($con, "Select * from list where id in " . $_SESSION['id']); // SQL Query
        while ($row = mysqli_fetch_array($query)) {
            print "<tr>";
            print '<td align="center">' . $row['id'] . "</td>";
            print '<td align="center">' . $row['product'] . "</td>";
            print '<td align="center">' . $row['quantity'] . "</td>";
            print '<td align="center"><a href="#" onclick="myFunction(' . $row['id'] . ')" style="color: #C6BFBE;">delete</a> </td>';

            print "</tr>";
        }
        ?>
    </table>


    <script>
        function myFunction(id) {
            var r = confirm("Are you sure you want to delete this product?");
            if (r == true) {
                window.location.assign("delete.php?id=" + id);
            }
        }
    </script>

    < ?php
    print '<a href="#" onclick="myFunction2(' . $_SESSION['id']  . ')" style="color: #C6BFBE;">Check out</a>';
    ?>
    <script>
        function myFunction2(id) {
            var r = confirm("Are you sure you want to Check out?");
            if (r == true) {
                window.location.assign("changeOrderStatus.php?id=" + id);
            }
        }
    </script> -->



</body>

</html>