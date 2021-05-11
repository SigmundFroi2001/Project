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
    if($_SESSION['user']){ //checks if user is logged in
    }
    else{
    header("location:login.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
    ?>
        <div class="navContainer">
			<div class="brand">
			<a href="main.php"><img src="https://media.discordapp.net/attachments/816131907083436072/841234993413095444/Q-Cane_Logo.png" alt="Logo" style="margin-top: -10px;width:125px;height:125px;"></a>
			</div>
			<nav>
				<ul>
					<li class="link"><a href="main.php">Home</a></li>
					<li class="link"><a href="products.php" style="text-decoration: underline;">Products</a></li>
					<li class="link"><a href="subscription.php">Subscription</a></li>
					<li class="link"><a href="check-out.php">Purchase</a></li>
					<li class="link"><a href="faq.php">FAQs</a></li>
					<?php
                        print '<li class="link">'. $user .'</li>';
                        print '<li class="link"><a href="../PHP-LOGIC/logout.php">Logout</a></li>'
                    ?>
				</ul>
			</nav>
		</div>

        <div class="center">
            <h1>Browse our Products!</h1>
        </div>

        <table>
            <tr>
                <td style="padding-bottom:50px;"><h2>Q-Cane Powdered Coffee</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841270925446086666/powedered_coffee.png?width=702&height=702" style="width: 250; height:250px;" /><br /><br />66.99 STD<br /><br />Enjoy A Cup Of Our Powdered Coffee Beverage,<br /> To Make Your Morning Everlasting.</td>
                <td style="padding-bottom:50px;"><h2>Q-Cane Powdered Tea Leaves</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841280881209376779/powedered_tea.png?width=702&height=702" style="width: 250; height:250px;" /><br /><br />66.99 STD<br /><br />Indulge A Cup Of Our Powdered Crushed Tea Leaves,<br /> To Make Your Day Soothing.</td>
            </tr>
            <tr>
                <td style="padding-bottom:50px;"><h2>Q-Cane Powdered Ice Tea</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841280882064883712/powedered_iced_tea.png?width=702&height=702" style="width: 250; height:250px;" /><br /><br />66.99 STD<br /><br />Quench Your Thirst With A Cold Brew Of Q-Cane Ice Tea,<br /> To Lift Yourself Sky High.</td>
                <td style="padding-bottom:50px;"><h2>Q-Cane Powdered Chocolate</h2><img src="https://media.discordapp.net/attachments/816131907083436072/841280888121983016/powedered_chocolate.png?width=702&height=702" style="width: 250; height:250px;" /><br /><br />66.99 STD<br /><br />Give In To Temptation,<br /> Give In To Q-Cane Powdered Chocolates.</td>
            </tr>
        </table>
        
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