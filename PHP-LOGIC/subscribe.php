<html>

<head>
    <title>Q-Cane Powdered Beverages</title>
    <link href="../CSS/design.css" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start(); //starts the session
    if ($_SESSION['user']) { //checks if user is logged in
    } else {
        header("location:../PHP/login.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
    ?>
    <div class="navContainer">
        <div class="brand">
            <a href="../PHP/main.php"><img src="https://media.discordapp.net/attachments/816131907083436072/841234993413095444/Q-Cane_Logo.png" alt="Logo" style="margin-top: -10px;width:125px;height:125px;"></a>
        </div>
        <nav>
            <ul>
                <li class="link"><a href="../PHP/main.php">Home</a></li>
                <li class="link"><a href="../PHP/products.php">Products</a></li>
                <li class="link"><a href="../PHP/subscription.php" style="text-decoration: underline;">Subscription</a></li>
                <li class="link"><a href="../PHP/check-out.php">Purchase</a></li>
                <li class="link"><a href="../PHP/faq.php">FAQs</a></li>
                <?php
                print '<li class="link">' . $user . '</li>';
                print '<li class="link"><a href="../PHP-LOGIC/logout.php">Logout</a></li>'
                ?>
            </ul>
        </nav>
    </div>

    <div class="center">
        <h1>Subscription Cart</h1>
    </div>

    <!-- Receipt Design on how much the user has to pay for the subscription -->

    <div class="center">
        <form action="subscribe.php" method="post">
            <input type='submit' value="Confirm" name='confirm_sub' />

            <?php
            if (isset($_POST['confirm_sub'])) {
                $con = mysqli_connect("localhost:3307", "root", "", "qcanedb") or die(mysqli_error($con)); //Connect to server
                $user = $_SESSION['user'];
                $query = mysqli_query($con, "Select * from users where username='". $user ."'");
                $id = 0;
                while($row = mysqli_fetch_array($query)){
                    if($row['username'] == $user){
                        $id = $row['UID'];
                        break;
                    }
                }

                $sub_status = 0;
                $query = mysqli_query($con, "Select * from subscriptions where UID='". $id ."'");
                $row = mysqli_fetch_array($query);
                while($row){
                    if($row['UID'] == $id){
                        $sub_status = $row['status'];
                        break;
                    }
                }

                if ($sub_status <= 0) {
                    mysqli_query($con, "UPDATE subscriptions SET status='1' WHERE UID='$id'");
                    $today = date('Y-m-d H:i:s');
                    $date = date('Y-m-d', strtotime('+1 month', strtotime($today)));
                    mysqli_query($con, "UPDATE subscriptions SET date_subscribed='$today',date_end='$date' WHERE UID='$id'");

                    print '<center><h3>Thank you for Subscribing!</h3></center>';
                } else {
                    print '<center><h3>You are already Subscribed!</h3></center>';
                }
            }
            ?>
        </form>
    </div>

    <footer>
        <h2>Contact Information</h2>
        <p style="float: left;">
            Email: anitabath@qcane.com<br />
            Phone Number: 0966-XXX-4518
        </p>
        <p style="float: right;">
            Email: johnniewalker@qcane.com<br />
            Phone Number: 0966-351-XXXX
        </p>
    </footer>


</body>

</html>