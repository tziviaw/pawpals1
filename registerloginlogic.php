<?php

$email = $password = "";
$emailErr = $passErr ="";
$loginErr = "";

if(isset($_POST['btn-login'])){
	if(trim($_POST['email'])=="")
		$emailErr = "enter email";
	else
		$email = strtolower(trim($_POST['email']));

	if(trim($_POST['password'])=="")
		$passErr = "enter password";
	else {
		$password = trim($_POST['password']);
		$passwordEncrypt = md5($password);
	}

	if($emailErr == "" && $passErr==""){
		$sql= "select * from users where email='$email' and password='$passwordEncrypt'";
		$result = $con->query($sql);

		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$username = $row['username'];
			
			$_SESSION['username'] = $username;

			header("Location: index.php");
			exit;
		}
		else{
			$loginErr = "Error logging in, please try again";
			echo $loginErr;
			// exit;
		}
	}
}


$fname = $lname = $email = $username = $password = $zipcode = $contact = "";
$fnameErr = $lnameErr = $emailErr = $usernameErr = $passwordErr = "";
$finalstatus = "";

if(isset($_POST['btn-register'])){

	$fname = ucfirst(trim($_POST['fname']));

	$lname =  ucfirst(trim($_POST['lname']));

	$email = strtolower(trim($_POST['email']));

	$sqlEmail = "select * from users where email = '$email'";
	$resultEmail = $con->query($sqlEmail);
	if($resultEmail->num_rows > 0)
		$emailErr = "Email exists, please choose another one or try logging in";

	$username = strtolower(trim($_POST['username']));

	$sqlUsername = "select * from users where username = '$username'";
	$result = $con->query($sqlUsername);
	if($result->num_rows > 0) 
		$usernameErr = "Username exists, please choose another one or try logging in";

	$password = trim($_POST['password']);
		$password = md5($password);

	$zipcode = $_POST['zipcode'];

	$contact = $_POST['contact'];
	$profiletype = $_POST['profiletype'];
	


	if ($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $usernameErr == "" && $passwordErr == "" ) {
		
		$sql = "insert into users(fname, lname, email, username, password, zipcode, contact, profiletype) 	
		values ('$fname', '$lname', '$email', '$username', '$password', '$zipcode', '$contact', '$profiletype')";
		
		if($con->query($sql) === true) {
				$_SESSION['username'] = $username;
				if ($profiletype == 'pet') {
					$_SESSION['profile'] = 'pet';
					header("Location: createprofile.php");
				}elseif($profiletype == 'sitter'){
					$_SESSION['profile'] = 'sitter';
					header("Location: createsitter.php");
			}elseif($profiletype =='both'){
					$_SESSION['profile'] == 'both';
					header("Location: createsitter.php");
			}
			// $finalstatus = "New user registered succesfully";
			// $fname=$lname=$email=$username=$password = "";
		}
		else{
			$finalstatus = $con->error;
		}
	}
}
?>