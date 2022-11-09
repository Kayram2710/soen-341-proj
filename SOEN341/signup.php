<?php 
	include_once 'views/header.php';
?>

	<section>
		<h2>Sign up</h2>

		<?php
			if(isset($_GET['error'])){

				if($_GET['error'] == "emptyinput"){
					echo "<p>Please fill in all fields!</p>";

				}else if($_GET['error'] == "invalidemail"){
					echo "<p>Please enter a valid email address!</p>";

				}else if($_GET['error'] == "emailistaken"){
					echo "<p>This email address is already taken! Please choose another one!</p>";

				}else if($_GET['error'] == "pwdnomatch"){
					echo "<p>Passwords do not match! Please enter your passwords again!</p>";

				}else if($_GET['error'] == "stmtfailed"){
					echo "<p>Something went wrong, try again!</p>";

				}else if($_GET['error'] == "none"){
					echo "<p>You have signed up!</p>";
				}
			}
		?>
		<form action="includes/signup.inc.php" method="post">	
			<input type="text" name="fName" placeholder="Your first name...">
			<input type="text" name="lName" placeholder="Your last name...">
			<input type="text" name="email" placeholder="Your email...">
			<input type="password" name="pwd" placeholder="Your password...">
			<input type="password" name="pwdRepeat" placeholder="Confirm password...">
			<br> Are you a supplier? 
			<input type="checkbox" name="role"><br>
			<button type="submit" name="submit">Sign up!</button>
		</form>
	</section>

<?php 
	include_once 'views/footer.php'
?>