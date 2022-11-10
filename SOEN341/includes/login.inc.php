<?php 

if(isset($_POST['submit'])){

	$identifier = $_POST['email'];
	$pwd = $_POST['pwd'];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputLogin($identifier, $pwd) !== false){
		header("location: ../login.php?error=emptyinput");
		exit();
	}

	loginUser($conn, $identifier, $pwd);

}else{
	header("location: ../login.php?");
	exit();
}