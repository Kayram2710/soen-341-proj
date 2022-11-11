<?php
	session_start();
?>

<!DOCTYPE html>
	<html lang="en" dir="ltr">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	
	<head>
		<meta charset="utf-8">
		<title>SOEN 341 PROJECT</title>
	</head>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<div class="container-fluid p-3">
			<ul class="navbar-nav">
				<a class="navbar-brand" href="#"><img src="img/Owl.png" style="width:40px;" class="rounded-pill"></a>
				<li><a href="home.php" class="nav-link">Home</a></li>
				<li><a href="#" class="nav-link">About Us</a></li>
				<li><a href="#" class="nav-link">Find Blog</a></li>
				<?php 
					if(isset($_SESSION['userID'])){
							echo "<li><a href='includes/logout.inc.php' class='nav-link'>Log out</a></li>";
					}else{
						echo "<li><a href='account.php' class='nav-link'>Log in</a></li>";
						echo "<li><a href='account.php?error=!' class='nav-link'>Sign up</a></li>";
					}
				?>
			</ul>
		</div>
			
	</nav>	

	<div class="container-fluid p-3 bg-light">

</html>