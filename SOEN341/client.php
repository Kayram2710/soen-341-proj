<?php 
	include_once 'views/header.php';

	//guard to keep each role in their respective page
	if(!isset($_SESSION['userRole'])){
        header("location: ./index.php");
    } elseif (($_SESSION['userRole']) == "supplier"){
        header("location: ./supplier.php");
    }
    
?>

