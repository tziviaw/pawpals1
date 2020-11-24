<?php
include "header.php";

$errMsg = "";

$imgupload = "";
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

		if(getimagesize($_FILES['imgupload']['tmp_name']) !== false){
			$imgupload = addslashes(file_get_contents($_FILES['imgupload']['tmp_name']));
		}
		else
		$imgErr = "upload an image";

		//	$imgupload = @$_POST['imgupload'];
		$availablefrom = @$_POST['availablefrom'];
		$availableto = @$_POST['availableto'];
		$description = @$_POST['description'];
		$description = mysqli_real_escape_string($con, $description);
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
			$sql = "insert into sitterprofiles (sp_username, sp_img, sp_description, sp_availablefrom, sp_availableto, sp_sun, sp_mon, sp_tues, sp_wed, sp_thurs, sp_fri, sp_sat)
			values('$username', '$imgupload', '$description', '$availablefrom', '$availableto', " 
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

			$id = $con->insert_id;

			if($_SESSION['profile'] == "both"){
				header('Location: createprofile.php');
			}else{
				header('Location: sitterprofile.php?sitter='.$id);
			}
		}

	}

?>
	<p class = "text-center"> Fill in the following fields to finish creating your sitter profile </p>
			
		<form method="post" action="createsitter.php" enctype="multipart/form-data">
			<div class="error"><?php echo $errMsg?></div>			
			<div class="myform form">	
			<div class="col-md-12 form-group">
				<div class="error" style="color: red;"> <?php echo $errMsg;?></div>
				<label for="exampleFormControlFile1">Upload picture</label>
				<input type="file" class="form-control-file" id="imgupload" name="imgupload" >
			</div>
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
</article>
<?php
}
else{
	header("Location:index.php");
}
?>
