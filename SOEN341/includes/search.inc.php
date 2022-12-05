<?php 

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	$firstID = $_GET['firstID'];
	$secondID = $_GET['secondID'];

if(isset($_POST["addSuper"])){
	
	//Add logged in user as supervisor
	addRelationship($conn, $firstID, $secondID);

	echo "<p> Super </p>";
	echo "<p> ".$secondID." </p>";
	echo "<p> ".$firstID." </p>";

}else if(isset($_POST["addEmp"])){

	//Add logged in user as employee
	
	addRelationship($conn, $secondID, $firstID);
	echo "<p> Emp </p>";

}else{
	header("location: ../account.php");
	exit();
}

?>