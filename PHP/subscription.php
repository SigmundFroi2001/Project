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
					<li class="link"><a href="products.php" >Products</a></li>
					<li class="link"><a href="subscription.php" style="text-decoration: underline;">Subscription</a></li>
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
            <h1>How our subscriptions works</h1>
        </div>

        <table>
            <tr>
                <td style="padding-bottom:50px;"><h2>Your favorite beverage delivered to you every month!</h2><p> By subscribing to our store,<br />We shall deliver our products to your doorstep.</p></td>
                <td style="padding-bottom:50px;"><h2>Cancel whenever you want</h2><p> Incase you're not satistified with our services,<br />(or want to take a break) monthly subscriptions can be 	 anytime!</p></td>
            </tr>
        </table>

		<div class="center">
			<p>Never run out of Q-cane brand beverages</p>
			<h2>Subscribe & Save 50% On Your First Order!</h2>
		</div>

		<table>
            <tr>
                <td style="padding-bottom:50px;"><img src="https://media.discordapp.net/attachments/816131907083436072/841270925446086666/powedered_coffee.png?width=702&height=702" style="width: 250; height:250px;" /></td>
                <td style="padding-bottom:50px;"><img src="https://media.discordapp.net/attachments/816131907083436072/841280881209376779/powedered_tea.png?width=702&height=702" style="width: 250; height:250px;" /></td>
                <td style="padding-bottom:50px;"><img src="https://media.discordapp.net/attachments/816131907083436072/841280882064883712/powedered_iced_tea.png?width=702&height=702" style="width: 250; height:250px;" /></td>
                <td style="padding-bottom:50px;"><img src="https://media.discordapp.net/attachments/816131907083436072/841280888121983016/powedered_chocolate.png?width=702&height=702" style="width: 250; height:250px;" /></td>
            </tr>
        </table>

		<div class="center">
			<button style="width:20%;" onclick="location.href='../PHP-LOGIC/subscribe.php'">Subscribe Now</button>
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