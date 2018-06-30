<?php
	include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form method="POST" class="signup-form" action="includes/signup.inc.php">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="lastname">
			<input type="text" name="email" placeholder="email">
			<input type="text" name="uid" placeholder="uid">
			<input type="password" name="pwd" placeholder="password">
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>
<?php
	include_once 'footer.php';
?>
