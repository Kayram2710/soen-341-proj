<?php 
	include_once 'views/header.php';
?>

	<section>
		<h2>For Testing purposes only</h2>
			<?php 
				if(isset($_SESSION['userID'])){
					echo "<p>Welcome back! " . $_SESSION["userLName"] . ", " . $_SESSION["userFName"] . "</p>";
				}
			?>
			<a href="login.php">To log in page</a>
			<a href="signup.php">To sign in page</a>		
		</form>		
	</section>



<?php 
	include_once 'views/footer.php'
?>