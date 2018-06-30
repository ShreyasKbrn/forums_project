<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link  rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
<nav>
	<div class_"main-wrapper">
	
		<div style="
			height: 2cm;
			width: 20%;
			margin: 0 auto;
			border: 1px solid black;	
			text-align: center;	
		"><b><i><p >The flipkart discussion forums</p></i></b></div>	
		
		<br>	
		<ul>
			<li><a href="index.php">Home</a></li>
		</ul>		
		<div class="nav-login">
			<?php
				if(isset($_SESSION['u_id'])){
					echo '			<form action="includes/logout.inc.php" method="POST">
				<button type="submit" name="submit">Logout</button>
			</form>';		
				} else {
					echo '			<form method="post" action="includes/login.inc.php">
				<input type="text" name="uid" placeholder="uid / email">
				<input type="password" name="pwd" placeholder="password">
				<button type="submit" name="submit">Login</button>
			</form>
			<a href="signup.php">Sign up</a>';
				}
			?>
		</div>
	</div>
</nav>
</header>

