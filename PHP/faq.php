<html>
	<head>
		<title>Q-Cane FAQs</title>
		<link href = "../CSS/design.css" rel = "stylesheet">
        <link href = "https://fonts.gstatic.com" rel = "preconnect">
        <link href = "https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Quicksand:wght@300;400;500;600;700&display=swap" rel = "stylesheet">
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
		<div class = "navContainer">
			<div class = "brand">
				<a href="main.php"><img src="https://media.discordapp.net/attachments/816131907083436072/841234993413095444/Q-Cane_Logo.png" alt="Logo" style="margin-top: -10px;width:75%;height:75%;"></a>
			</div>
			<nav>
				<ul>
					<li class = "link"><a href = "main.php">Home</a></li>
					<li class = "link"><a href = "products.php">Products</a></li>
					<li class = "link"><a href = "subscription.php">Subscription</a></li>
					<li class = "link"><a href = "check-out.php">Purchase</a></li>
					<li class = "link"><a href = "faq.php" style = "text-decoration: underline;">FAQs</a></li>
					<?php
                        print '<li class="link">'. $user .'</li>';
                        print '<li class="link"><a href="../PHP-LOGIC/logout.php">Logout</a></li>'
                    ?>
				</ul>
			</nav>
		</div>
		<div class="center" style="width: 75%;">

			<h1>Frequently Asked Questions</h1>
				<h2>What makes the products at Q-cane different from the others?</h2>
					<p>Q-cane is focused on selling products relating to powdered beverages such as chocolate, coffee, iced tea, tea and the like.
					Q-cane's products are supplied by local farmers that cultivate their own crops from São Tomé & Príncipe, this not only helps the farmers
					but also help advocate the products or agriculture present in Sao Tome and Principe.
					</p>
					
				<h2>What is Sao Tome & Principe?</h2>
					<p>São Tomé & Príncipe is an African country <a href = "https://wwwnc.cdc.gov/travel/images/destination-map-sao-tome-and-principe.png" style="color: teal;">located</a>
					at the equator in the Gulf of Guinea. The country has two names was due to the two main islands making up the country. Due to
					climate and temperature of the country, the ecnomy has thrived because of the agriculture. Two-thirds of the cultivated land in São Tomé & 
					Príncipe is populated by cacao trees.
					</p>

				<h2>What benefits does being subscriber have?</h2>
					<p>A Q-cane subscriber gets to be able to receive the featured product of the month to their doorstep. Subscribers can get
					alerted to be informed of the latest or brand new products available to be purchased. Additionally, subscribers will get a 50% discount
					for the first purchase while getting 10% discount for the following purchases.
					</p>
						<br>

					<p>If you didn't find your question here, you may contact us <a href = "#contact">here</a></p>
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
<html>