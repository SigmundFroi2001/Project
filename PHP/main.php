<html>
	<head>
		<title>Q-Cane Powdered Beverages</title>
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

		<div class="hero-image">
			<div class="hero-text">
			  <h1>Welcome to Q-cane</h1>
			  <p>Browse the different São Tomé & Príncipe based products.</p>
			  <a href="products.php"><button>Browse Products</button></a>
			</div>
		</div>
		
		<div class="information">
			<table>
				<tr>
					<td><h2>Local Sourced</h2><br />Q-cane is a company that aims to promote and advocate the different local products that can be available in Sao Tome and Principe.</td>
					<td><h2>Premium Quality</h2><br />Products are made from sourced beans and leaves of the highest quality from the local farmers of Sao Tome and Principe.</td>
					<td><h2>Charity</h2><br />Aside from boosting economic growth, Q-cane has a goal to help the children of Sao Tome and Principe. As a developing country, poverty has taken a toll especially to the children.</td>
				</tr>
				
			</table>
			<table>
				<tr>
					<td><img src="https://upload.wikimedia.org/wikipedia/commons/2/26/Alda_Neves_da_Gra%C3%A7a_do_Esp%C3%ADrito_Santo.jpg" style="width: 200; height:200px;"></td>
					<td>"Working, struggling, struggling and conquering,"<br /> We go ahead with giant steps	<br /><h2>-Alda Neves da Graça do Espírito Santo</h2></td>
				</tr>
			</table>
			<h1>Subscribe & Save!</h1>
			<p>
				You'll receive 50% off your first order when you subscribe, and 10% off all future recurring orders.
				<br />
				Enjoy the featured product of the month while getting a discount on your purchases with a subscription.
			</p>
			<a href="subscription.php"><button style="width: 25%;">Subscribe</button></a>
		</div>

	</body>	

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
</html>