<?php
include "header.php";
?>
<?php
$errMsg = "";

$availablefrom = "";
$availableto = "";
$description = "";
$sun = "";
$mon = "";
$tues = "";
$wed = "";
$thurs = "";
$fri = "";
$sat = "";

if ($username) {

	if (isset($_POST['btn-createsitter'])){
		$availablefrom = @$_POST['availablefrom'];
		$availableto = @$_POST['availableto'];
		$description = @$_POST['description'];
		$sun = @$_POST['sunday'];
		$mon = @$_POST['monday'];
		$tues = @$_POST['tuesday'];
		$wed = @$_POST['wednesday'];
		$thurs = @$_POST['thursday'];
		$fri = @$_POST['friday'];
		$sat = @$_POST['saturday'];

		if($availablefrom==""||$availableto==""||$description==""){
			$errMsg = "Please enter all fields";
		}
		else{
			$sql = "insert into sitterprofiles (sp_username, sp_description, sp_availablefrom, sp_availableto, sp_sun, sp_mon, sp_tues, sp_wed, sp_thurs, sp_fri, sp_sat)
			values('$username', '$description', '$availablefrom', '$availableto', " 
			. ($sun ? 1 : 0) . ", " 
			. ($mon ? 1 : 0) . ", "
			. ($tues ? 1 : 0) . ", "
			. ($wed ? 1 : 0) . ", "
			. ($thurs ? 1 : 0) . ", "
			. ($fri ? 1 : 0) . ", "
			. ($sat ? 1 : 0) . "" .
			");";
			// echo $sql;
			// exit;
			$result = $con->query($sql) or die($con->error);

			$sqlid = "select sp_id from sitterprofiles where sp_username = '$username';";
			$result = $con->query($sqlid);
			$row = $result->fetch_assoc();
			$id = $row['sp_id'];

			header('Location: sitterprofile.php?sitter='.$id);
		}

	}

?>
	<p class = "text-center"> Fill in the following fields to finish creating your sitter profile </p>
			
		<form method="post" action="createsitter.php">
			<div class="error"><?php echo $errMsg?></div>			
			<div class="myform form">	
					<div class="form-group">
						<label for="exampleInputEmail1">Availability</label><br>
							<input type="checkbox" id="monday" name="monday" value="1" <?=$mon == "1" ? "checked" : ""?>> <label for="monday">Monday</label><br>
							<input type="checkbox" id="tuesday" name="tuesday" value="1" <?=$tues == "1" ? "checked" : ""?>> <label for="tuesday">Tuesday</label><br>
							<input type="checkbox" id="wednesday" name="wednesday" value="1" <?=$wed == "1" ? "checked" : ""?>> <label for="wednesday">Wednesday</label><br>
							<input type="checkbox" id="thursday" name="thursday" value="1" <?=$thurs == "1" ? "checked" : ""?>> <label for="thursday">Thursday</label><br>
							<input type="checkbox" id="friday" name="friday" value="1" <?=$fri == "1" ? "checked" : ""?>> <label for="friday">Friday</label><br>
							<input type="checkbox" id="saturday" name="saturday" value="1" <?=$sat == "1" ? "checked" : ""?>> <label for="saturday">Saturday</label><br>
							<input type="checkbox" id="sunday" name="sunday" value="1" <?=$sun == "1" ? "checked" : ""?>> <label for="sunday">Sunday</label><br>
				</div>

				<div class="md-form mx-5 my-5">
					<label for="inputMDEx1">Available From</label>
  					<input type="time" id="inputMDEx1" name="availablefrom" class="form-control" value="<?=$availablefrom?>">
  					
				</div>


				<div class="md-form mx-5 my-5">
					<label for="inputMDEx1">Available To</label>
  					<input type="time" id="inputMDEx1" name="availableto" class="form-control" value="<?=$availableto?>">
  									
					</div>
				

				<label> Description </label>
				<input type="text" placeholder="Enter a Description" name="description" class="form-control" value="<?=$description?>"/>

				<input type="submit" name="btn-createsitter" class="btn btn-success form-control submit-button create-sitter-btn" />

			</div>


				
				<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

<?php
}
else{
	header("Location:index.php");
}
?>
