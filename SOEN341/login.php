<?php 
	include_once 'views/header.php';
?>

	<section>
		<h2>Log in</h2>
		<form action="login.inc.php" method="post">	
			<input type="text" name="name" placeholder="Your full name...">
			<input type="text" name="email" placeholder="Your email...">
			<input type="text" name="uid" placeholder="Your username...">
			<input type="password" name="pwd" placeholder="Your password...">
			<input type="password" name="pwdRepeat" placeholder="Confirm password...">
			<button type="submit" name="submit">Sign up!</button>
		</form>		
	</section>


<?php 
	include_once 'views/footer.php'
?>