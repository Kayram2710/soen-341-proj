<?php 

if(isset($_POST["submit"])){
	
	$fName = $_POST["fName"];
	$lName = $_POST["lName"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputSignup($fName, $lName, $email, $pwd, $pwdRepeat) !== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}

	if(invalidEmail($email) != false){
		header("location: ../signup.php?error=invalidemail");
		exit();
	}

	if(emailTaken($conn, $email) != false){
		header("location: ../signup.php?error=emailistaken");
		exit();
	}

	if(pwdMatch($pwd, $pwdRepeat) != false){
		header("location: ../signup.php?error=pwdnomatch");
		exit();
	}

	//createUser($conn, $fName, $lName, $email, $pwd);

}else{
	header("location: ../signup.php");
	exit();
}