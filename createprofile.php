<?php 
include "header.php"; 
?>
<?php
$errMsg = "";

$imgupload = "";
$petname = "";
$pettype = "";
$petbreed = "";
$petsize = "";

if ($username) {

	if (isset($_POST['btn-createpetprofile'])){

		$imgupload = @$_POST['imgupload'];
		$petname = ucfirst(@$_POST['petname']);
		$pettype = ucfirst(@$_POST['pettype']);
		$petbreed = ucfirst(@$_POST['petbreed']);
		$petsize = ucfirst(@$_POST['petsize']);
		$description = @$_POST['description'];

		// var_dump($_POST);
		// var_dump($_FILES);
		// var_dump($_FILES['imgupload']['tmp_name']);
		// var_dump(getimagesize($_FILES['imgupload']['tmp_name']));

		// exit;

		//if button with the name uploadfilesub has been clicked
		if(getimagesize($_FILES['imgupload']['tmp_name']) !== false){
			// $imgContent = addslashes(file_get_contents($_FILES['imgupload']['tmp_name']));
			$image = $_FILES['imgupload']['tmp_name'];
			$imgContent = base64_encode(file_get_contents(addslashes($image)));

		} 
		// echo $imgContent;
		// exit;

		if ($description==""||$petbreed==""||$petname==""||$pettype==""||$petsize==""){
			$errMsg = "Please enter all fields"; 
			}
		else{
			$sql = "insert into petprofiles (pp_username, pp_description, pp_img, petname, pettype, breed, size)
				values('$username', '$description', '$imgContent', '$petname', '$pettype', '$petbreed', '$petsize');";
			// echo $sql;
			// exit;
			$result = $con->query($sql) or die($con->error);

			$id = $con->insert_id;
			
			if($_SESSION['haspet']==0){
			user::updateUserPet($username, $con);
			}
			// echo $id;
			// exit;
			header('Location: petprofile.php?pet='.$id);
		}

	}

?>
<!--Main section-->
   <div class="container">
		<div>
			<h1>Create a Pet Profile</h1>
		</div>
     	<form method="post" action="createprofile.php" enctype="multipart/form-data">
	
			<!--Upload pic-->
         	<div class="col-md-12 form-group">
			 	<div class="error" style="color: red;"> <?php echo $errMsg;?></div>
				<label for="exampleFormControlFile1">Upload picture</label>
				<input type="file" name="imgupload">
			</div>

		    <!--Field 1&2-->
			<div class="form-group">
				<div class="col-md-6">
					<label>Pet Name</label>
					<input type="text" class="form-control" placeholder="Pet Name" name="petname" value="<?php echo $petname?>">	
				</div>
			
				<div class="col-md-6">
					<label>Type</label>
					<input type="text" class="form-control" placeholder="Type" name="pettype" value="<?php echo $pettype?>">
				</div>	
				<div class="col-md-6">
					<label>Breed</label>
					<input type="text" class="form-control" placeholder="Breed" name="petbreed" value="<?php echo $petbreed?>">
				</div>	
				<div class="col-md-6">
					<label for="sel1">Pet Size(select one):</label>
					<select class="form-control" id=
					"sel1" name="petsize">
					<option>Small</option>
					<option>Medium</option>
					<option>Large</option>
					</select> 
				</div>	
			</div>	
  
			<!--Text Area -->    
      		<div class="col-md-12 form-group">
        		<label for="exampleFormControlTextarea1">About</label>
        		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="<?php echo $description?>"></textarea>
         	</div>
          
  <!--Submit-->
  			<div class="form-group">
          		<div class="col-sm-6 col-sm-offset-3">
        			<!-- <a href="#" class="btn btn-block btn-primary btn-success" name="btn-createpetprofile"> Submit</a> -->
					<input type="submit" class="btn btn-success form-control submit-button create-pet-btn" name="btn-createpetprofile" />

				</div>
			</div>
		</form>
	</div> 

</article>
<?php }?>
<?php 
include "footer.php"; 
?>
