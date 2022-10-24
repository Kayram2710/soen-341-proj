<?php 
	include_once 'views/header.php';
?>

	<section>
		<h2>Log in</h2>
		<form action="login.inc.php" method="post">	
			<input type="text" name="name" placeholder="Your username/email...">
			<input type="password" name="pwd" placeholder="Your password...">
			<button type="submit" name="submit">Log in!</button>
		</form>		
	</section>


<?php 
	include_once 'views/footer.php'
?>