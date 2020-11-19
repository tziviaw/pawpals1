<?php 
session_start();
include "db.php";

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
			header("Location: createlisting.php");
		}
		else{
			$loginErr = "Error logging in, please try again";
		}
	}
	}


$firstname = $lastname = $email = $username = $password = $zipcode = $contact = "";
$firstnameErr = $lastnameErr = $emailErr = $usernameErr = $passwordErr = "";
$finalstatus = "";

if(isset($_POST['btn-register'])){

	$firstname = ucfirst(trim($_POST['fname']));

	$lastname =  ucfirst(trim($_POST['lname']));

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


	if ($firstnameErr == "" && $lastnameErr == "" && $emailErr == "" && $usernameErr == "" && $passwordErr == "" ) {
		
		$sql = "insert into users(fname, lname, email, username, password, zipcode, contact) 	values ('$firstname', '$lastname', '$email', '$username', '$password', '$zipcode', '$contact')";

		if($con->query($sql) === true) {

			header("Location: createsitter.php");
// $finalstatus = "New user registered succesfully";
			$firstname=$lastname=$email=$username=$password = "";
		}
		else{
			$finalstatus = $con->error;
		}

	}

}
include "header.php"; 
?>
		<div class="container">
		<div class="row">
		<div class="col-md-12">
			<div id="first">
				<div class="myform form">
					<div class="logo">
						<div class="text-center">
							<h1>Login</h1>
							<p> <?php echo $finalstatus ?>
						</div>
					</div>
					<form  method="post" action="registerlogin.php" name="login" id="login">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label> &nbsp;<span class="error"><?php echo $emailErr ?> <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label> &nbsp;<span class="error"><?php echo $passErr ?></span> <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Password" style="text-decoration: none">
						</div>
						<div class="text-center">
							<input type="submit" name = "btn-login" class="btn btn-block mybtn btn-primary" value="Login" />
						</div>
						<div class="form-group">
							<p class="text-center">Don't have an account? <a href="#" id="signup">Register here</a></p>
						</div>
					</form>
				</div>
			</div>

			<div id="second">
				<div class="myform form">
					<div class="logo">
						<div class="text-center">
							<h1>Register</h1>
						</div>
					</div>
					<form method="post" action="registerlogin.php" enctype = "multipart/form-data" name="registration" id="registration">
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label> <input type="text" name="firstname" class="form-control" value = "<?php echo $firstname; ?>" id="firstname" placeholder="First Name" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Last Name</label> <input type="text" name="lastname" class="form-control" value = "<?php echo $lastname; ?>" id="lastname" placeholder="Last Name" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label> <span class = "error"> <?php echo $emailErr; ?> </span> <input type="email" name="email" class="form-control" value = "<?php echo $email; ?>" id="email" placeholder="Email" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label> <span class = "error"> <?php echo $usernameErr; ?> </span> <input type="text" name="username" class="form-control" value = "<?php echo $username; ?>" id="username" placeholder="Username" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>  <input type="password" name="password" class="form-control" value = "<?php echo $password; ?>" id="password" placeholder="Password" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleFormControlFile1">Profile Type</label><br> <input type="radio" name="choice-profile" id="choice-profile-sitter"> <label for="choice-profile-sitter">Sitter</label> <input type="radio" name="choice-profile" id="choice-profile-pet"> <label for="choice-profile-pet">Pet</label> <input type="radio" name="choice-profile" id="choice-profile-both"> <label for="choice-profile-pet">Both</label>
							<div class="reveal-if-active">
								<div class="form-group">
									<label for="exampleFormControlFile1">Upload picture</label> <input type="file" name = "profileimage" class="form-control-file" id="exampleFormControlFile1">
								</div>
								<div class="form-group">
									<label>Zipcode</label> <input type="text" name="zipcode" class="form-control" placeholder="12345">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Contact Number</label> <input type="contactnumber" name="contact" class="form-control" placeholder="123-456-7890">
								</div>
								
							</div>
							
							<div class="text-center">
								<input type="submit" name = "btn-register" value="REGISTER" class="btn btn-block mybtn btn-primary />
							</div>
							
							<div>
								<div class="form-group">
									<p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
		</div>
	</article>
    
<?php 
include "footer.php"; 
?>