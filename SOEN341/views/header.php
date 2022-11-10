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
							//echo "<li><a href='index.php'>Profile</a></li>";
							echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
						}else{
							echo "<li><a href='account.php'>Log in</a></li>";
							echo "<li><a href='account.php?error=!'>Sign up</a></li>";
						}
					?>
				</ul>
			</div>
			
		</nav>	

	<div class="container-fluid p-3 bg-light">