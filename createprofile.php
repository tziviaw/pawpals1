<?php
session_start();
include "header.php";
if(isset($_SESSION['username'])){

	include "db.php";
	include "class.user.php";
	
	$userob = new user();
	
	$username = $_SESSION['username'];

	$username = "";
	if(isset($_GET['user'])){
		$username = trim($_GET['user']);
	}
	else{
		$username = $_SESSION['username'];
	} 

	$user_details = $userob->getUserDetails($username, $con);

	$sitter_details = $userob->getSitterDetails($username, $con);
	
	$pet_details = $userob->getPetDetails($username, $con);
	

	$petname = $pettype = $breed = $size = $petabout  = "";
	$petnameErr = $pettypeErr = $breedErr = $sizeErr = $petaboutErr = "";
	$finalstatus = "";
	
	if(isset($_POST['btn-register'])){
	
		$petname = ucfirst(trim($_POST['petname']));
	
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
			
			$sql = "insert into users(firstname, lastname, email, username, password, zipcode, contact) 	values ('$firstname', '$lastname', '$email', '$username', '$password', '$zipcode', '$contact')";
	
			if($con->query($sql) === true) {
	
				header("Location: createsitter.php");
	// $finalstatus = "New user registered succesfully";
				$firstname=$lastname=$email=$username=$password = "";
			}
			else{
				$finalstatus = $con->error;
			}
	
		}

?>
	
<!--Main section-->
   <div class="container">
		<div>
			<h1>Create a Pet Profile</h1>
		</div>
      
     	<form>
			<!--Upload pic-->
         	<div class="col-md-12 form-group">
				<label for="exampleFormControlFile1">Upload picture</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1">
			</div>

		    <!--Field 1&2-->
			<div class="form-group">
				<div class="col-md-6">
				<label>Pet Name</label> <span class = "error"> <?php echo $petnameErr; ?> </span> 
				<input type="text" placeholder="Pet Name" name="name" class="form-control" value="<?php echo $petname ?>" />
				</div>
			
				<div class="col-md-6">
					<label>Type</label>
					<input type="text" name="" class="form-control" placeholder="Type">
				</div>	
				<div class="col-md-6">
					<label>Breed</label>
					<input type="text" name="" class="form-control" placeholder="Breed">
				</div>	
				<div class="col-md-6">
					<label for="sel1">Pet Size(select one):</label>
					<select class="form-control" id=
					sel1">
					<option>Small</option>
					<option>Medium</option>
					<option>Large</option>
					</select> 
				</div>	
			</div>	
  
			<!--Text Area -->    
      		<div class="col-md-12 form-group">
        		<label for="exampleFormControlTextarea1">About</label>
        		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
         	</div>
          
  <!--Submit-->
  			<div class="form-group">
          		<div class="col-sm-6 col-sm-offset-3">
				  <input type="submit" name = "btn-register" value="SUBMIT" class="btn btn-block mybtn btn-primary />
	 			</div>
			</div>
		</form>
	</div> 

</article>


<?php
}
else{
	header("Location:loginregister.php");
}
include "footer.php"; 
?>