<?php 

if(isset($_POST["submit"])){
	
	$fName = $_POST["fName"];
	$lName = $_POST["lName"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputUpdate($fName, $lName) !== false){
		header("location: ../profileUpdate.php?error=emptyinput");
		exit();
	}

	updateUser($conn, $fName, $lName, $_SESSION['userID']);

}else{
	header("location: ../account.php");
	exit();
}

?>