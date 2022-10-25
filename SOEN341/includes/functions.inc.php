<?php

function emptyInputSignup($fName, $lName, $email, $pwd, $pwdRepeat){
	$result;
	if(empty($fName) || empty($lName) || empty($email) || empty($pwd) || empty($pwdRepeat)){
		$result = true;
	}else{
		$result = false;
	}
	echo $result;
	return $result;
}

function invalidEmail($email){
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdRepeat){
	$result;
	if($pwd !== $pwdRepeat){
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}

function emailTaken($conn, $email){

	$sql = "SELECT * FROM user WHERE email = ?;";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}

function createUser($conn, $fName, $lName, $email, $pwd){

	$sql = "INSERT INTO user (fName, lName, email, password) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, 'ssss', $fName, $lName, $email, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../signup.php?error=none");
	exit();
}