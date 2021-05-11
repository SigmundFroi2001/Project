<html>

<head>
    <title>Q-Cane Beverages</title>
    <link href="../CSS/design.css" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="navContainer">
			<div class="brand">
            <a href="main.html"><img src="https://media.discordapp.net/attachments/816131907083436072/841234993413095444/Q-Cane_Logo.png" alt="Logo" style="margin-top: -10px;width:125px;height:125px;"></a>
			</div>
			<nav>
				<ul>
					<li class="link"><a href="../HTML/main.html">Home</a></li>
					<li class="link"><a href="../HTML/products.html" >Products</a></li>
					<li class="link"><a href="../HTML/subscription.html">Subscription</a></li>
					<li class="link"><a href="../HTML/check-out.html">Purchase</a></li>
					<li class="link"><a href="../HTML/faq.html">FAQs</a></li>
				</ul>
			</nav>
	</div>

    <div class="x">
        <div class="title" align=center>
            <h2>Registration Page</h2>
        </div>
        <div class="y" align=center>
            <form action="register.php" method="POST">
                <table>
                    <tr>
                        <td style="color:black;">Enter Username:</td>
                        <td><input type="text" name="username" required="required" /></td>
                    </tr>
                    <tr>
                        <td style="color:black;">Enter Password:</td>
                        <td><input type="password" name="password" required="required" /></td>
                    </tr>
                </table><br>
                <input type="submit"  class="inputSumbit" style="background-color: #D21034;color: white;padding-top: 12px;padding-bottom: 12px;border: none;text-transform: uppercase;font-size: 11px;position: relative;z-index: 500;letter-spacing: 0.06em;text-align: center;cursor: pointer;width: 25%;transition: 0.8s all ease;margin-bottom: 25px;" value="Register" /><br /><br />

                <a href="login.php" style="color: black;">Have an Account? Login Here!</a>

        </div>
    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST['username']);
    $password = ($_POST['password']);
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $bool = true;
    $db_name = "qcanedb";
    $db_username = "root";
    $db_pass = "";
    $db_host = "localhost:3307";

    $con = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die('Error: ' . mysqli_error($con)); //Connect to server

    $query = "SELECT * from users";
    $results = mysqli_query($con, $query); //Query the users table

    while ($row = mysqli_fetch_array($results)) //display all rows from query
    {
        $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished 
        if ($username == $table_users) // checks if there are any matching fields
        {
            $bool = false; // sets bool to false
            print '<script>alert("Username has been taken!");</script>'; //Prompts the user
            print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
        }
    }
    if ($bool) // checks if bool is true
    {
        // IF status == 0, then status of the user is a customer; else, admin
        // subscription by default is set to 0 and will be updated when logged in if the user wants to subscribe
        mysqli_query($con, "INSERT INTO users (status, username, password) VALUES ('0','$username','$password')"); //Inserts the value to table
        mysqli_query($con, "INSERT INTO subscriptions (status) VALUES ('0')"); //Inserts the value to table users
        print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
        print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
}
?>