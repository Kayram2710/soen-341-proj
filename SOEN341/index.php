<?php 
	include_once 'views/header.php';

	//guard to keep each role in their respective page
	if(isset($_SESSION['userRole'])){
		if (($_SESSION['userRole']) == "supplier"){
			header("location: ./supplier.php");
		} elseif (($_SESSION['userRole']) == "client"){
			header("location: ./client.php");	
		}
	}
?>

	<section>
		<?php 
			header("location: ./account.php");
		?>
	</section>


<?php 
	include_once 'views/footer.php'
?>