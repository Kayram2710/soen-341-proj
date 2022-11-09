<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<head>
		<meta charset="utf-8">
		<title>SOEN 341 PROJECT</title>
		<link rel="stylesheet" href="css/stylesheet.css">
	</head>
	<body>

		<nav>
			<div class="container-fluid p-3">
				<a href="index.php"><img src="img/Owl.png" alt="Placeholder"></a>
				<ul>
					<div class="row">
					<li><a href="index.php">Home</a></li>
					<!--<li><a href="discover.php">About Us</a></li>
					 <li><a href="blog.php">Find Blog</a></li> -->
					<?php 
						if(isset($_SESSION['userID'])){
							echo "<li><a href='profile.php'>Profile</a></li>";
							echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
						}else{
							echo "<li><a href='login.php'>Log in</a></li>";
							echo "<li><a href='signup.php'>Sign up</a></li>";
						}
					?>
				</ul>
			</div>
			
		</nav>	

<div class="container-fluid p-3 bg-light">