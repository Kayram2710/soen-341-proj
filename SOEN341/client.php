<?php 
	include_once 'views/header.php';

	if(!isset($_SESSION['userRole']) || !($_SESSION['userRole'] == "client") ){
        header("location: ./index.php");
    }
    
?>

<?php 
	include_once 'views/footer.php';
?>

