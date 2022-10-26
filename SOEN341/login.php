<?php 
	include_once 'views/header.php';
?>

	<section>
		<h2>Log in</h2>

		<?php
			if(isset($_GET['error'])){

				if($_GET['error'] == "emptyinput"){
					echo "<p>Please fill in all fields!</p>";

				}else if($_GET['error'] == "wronglogin"){
					echo "<p>Please enter a valid email address!</p>";

				}else if($_GET['error'] == "wrongpwd"){
					echo "<p>Password is incorrect! Please enter your password again!</p>";

				}
			}
		?>
		<form action="includes/login.inc.php" method="post">	
			<input type="text" name="email" placeholder="Your email...">
			<input type="password" name="pwd" placeholder="Your password...">
			<button type="submit" name="submit">Log in!</button>
		</form>		
	</section>


<?php 
	include_once 'views/footer.php'
?>