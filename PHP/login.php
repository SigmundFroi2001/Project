<html>
    <head>
        <title>Q-Cane Login</title>
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
                <h2>Login Page</h2>
            </div>
            <div class="y" align=center>
            <form action="../PHP-LOGIC/checklogin.php" method="POST">
                <table>
                <tr>
                    <td style="color:black;">Enter Username:</td>
                    <td ><input type="text" name="username" required="required" /></td>
                </tr>
                <tr>
                    <td style="color:black;">Enter Password:</td>
                    <td><input type="password" name="password" required="required" /></td>
                </tr>
                </table><br>
                <input type="submit" id="submit" value="Login" style="background-color: #D21034;color: white;padding-top: 12px;padding-bottom: 12px;border: none;text-transform: uppercase;font-size: 11px;position: relative;z-index: 500;letter-spacing: 0.06em;text-align: center;cursor: pointer;width: 25%;transition: 0.8s all ease;margin-bottom: 25px;"><br/><br/>
                
                <a href="register.php" style="color: black;">Don't have an account? Register Here!</a>
            
            </div>
        </div> 
    </body>
</html>