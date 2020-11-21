<?php

include "header.php";
include "db.php";
include "class.user.php";

$monday = $tuesday = $wednesday = $thursday = $friday = $saturday = $sunday = $availablefrom = $availableto = $description = "";


if(isset($_POST['btn-register'])){


$monday = $_POST['monday'];



$availablefrom = $_POST['availablefrom'];

$availableto = $_POST['availableto'];

$description = $_POST['description'];

	$sql = "insert into sitterprofiles(sp_days, sp_availablefrom, sp_availableto, sp_description) 	values ('$monday', '$availablefrom', '$availableto', '$description')";

	if($con->query($sql) === true) {

		$monday=$availablefrom=$availableto=$description = "";
		
		}

	}


if(isset($_SESSION['username'])){

	include "db.php";
	
	
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
	
	$image_show = $pet_details['pp_img']



?>

<style>

	p {

		font-weight: bold;
		font-size: 120%;
	}

</style>


	<p class = "text-center"> Fill in the following fields to finish creating your sitter profile </p>




			
		<form method="post" action="createsitter.php">			
			<div class="myform form">	
					<div class="form-group">
						<label for="exampleInputEmail1">Availability</label><br>
						<form action="/action_page.php">
							<input type="checkbox" id="monday" name="monday" value="Monday"> <label for="monday">Monday</label><br>
							<input type="checkbox" id="tuesday" name="tuesday" value="Tuesday"> <label for="tuesday">Tuesday</label><br>
							<input type="checkbox" id="wednesday" name="wednesday" value="Wednesday"> <label for="wednesday">Wednesday</label><br>
							<input type="checkbox" id="thursday" name="thursday" value="Thursday"> <label for="thursday">Thursday</label><br>
							<input type="checkbox" id="friday" name="friday" value="Friday"> <label for="friday">Friday</label><br>
							<input type="checkbox" id="saturday" name="saturday" value="Saturday"> <label for="saturday">Saturday</label><br>
							<input type="checkbox" id="sunday" name="sunday" value="Sunday"> <label for="sunday">Sunday</label><br>
							
						</form>
					

				</div>

				<div class="md-form mx-5 my-5">
					<label for="inputMDEx1">Available From</label>
  					<input type="time" id="inputMDEx1" name = "availablefrom" class="form-control">
  					
				</div>


				<div class="md-form mx-5 my-5">
					<label for="inputMDEx1">Available To</label>
  					<input type="time" id="inputMDEx1" name = "availableto" class="form-control">
  									
					</div>
				

				<label> Description </label>
				<input type="text" placeholder="Enter a Description" name="description" class="form-control" />

				<input type="submit" name="btn-register" class="btn btn-success form-control submit-button" />

			</div>


				
				<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>









<?php
}
else{
	header("Location:index.php");
}
?>