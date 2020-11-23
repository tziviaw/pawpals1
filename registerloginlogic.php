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
			$_SESSION['haspet'] = $row['hasPet'];
			$_SESSION['hassitter'] = $row['hasSitter'];
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
	// echo var_dump($_POST);
	// exit;
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
	$profile = $_POST['choice-profile'];

	// echo $profile;
	// exit;

	if(getimagesize($_FILES['profileimage']['tmp_name']) !== false){
		// $imgContent = addslashes(file_get_contents($_FILES['imgupload']['tmp_name']));
		$image = $_FILES['profileimage']['tmp_name'];
		$imgContent = base64_encode(file_get_contents(addslashes($image)));

	} 


	if ($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $usernameErr == "" && $passwordErr == "" ) {
		if($profile == "sitter"){
			$hassitter = 1;
			$haspet = 0;
		}elseif($profile == "pet"){
			$haspet = 1;
			$hassitter = 0;
		}elseif($profile == "both"){
			$haspet = 1;
			$hassitter = 1;
		}

		$sql = "insert into users(fname, lname, email, username, password, zipcode, contact, img, hasSitter, hasPet) 	values ('$fname', '$lname', '$email', '$username', '$password', '$zipcode', '$contact', '$imgContent', '$hassitter', '$haspet')";
		$success = $con->query($sql) or die($con->error);
		// echo $sql;
		// echo $success;
		// exit;
		
		if($success === true && $profile == "both") {
				$_SESSION['username'] = $username;
				$_SESSION['haspet'] = 1;
				$_SESSION['hassitter'] = 1;
				header("Location: createsitter.php");
			// $finalstatus = "New user registered succesfully";
			// $fname=$lname=$email=$username=$password = "";
		}
		elseif($success === true && $profile == "sitter"){
			$_SESSION['username'] = $username;
			$_SESSION['haspet'] = 0;
			$_SESSION['hassitter'] = 1;
			header("Location: createsitter.php");
		} elseif($success === true && $profile == "pet"){
			$_SESSION['username'] = $username;
			$_SESSION['haspet'] = 1;
			$_SESSION['hassitter'] = 0;
			header("Location: createprofile.php");
		}
		
		else{
			$finalstatus = $con->error;
		}
	}

}
?>