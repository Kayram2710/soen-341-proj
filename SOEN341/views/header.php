<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>SOEN 341 PROJECT</title>
		<link rel="stylesheet" href="css/stylesheet.css">
	</head>
	<body>

		<nav>
			<div class="wrapper">
				<a href="index.php"><img src="img/Owl.png" alt="Placeholder"></a>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="discover.php">About Us</a></li>
					<li><a href="blog.php">Find Blog</a></li>
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

<div class="wrapper">