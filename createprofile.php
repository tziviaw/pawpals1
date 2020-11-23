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

	if (isset($_POST['btn-createprofile'])){
		$imgupload = @$_POST['imgupload'];
		$pettype = @$_POST['petname'];
		$petbreed = @$_POST['pettype'];
		$petsize = @$_POST['petsize'];

		if ($imgupload==""||$petname==""||$pettype==""||$petsize==""){
			$errMsg = "Please enter all fields";
			}
		else{
			$sql = "insert into petprofiles (pp_username, pp_description, pp_img, petname, pettype, breed, size)
				values('$username', '$description', '$imgupload', '$petname', '$pettype', '$petbreed', '$petsize');";
			// echo $sql;
			// exit;
			$result = $con->query($sql) or die($con->error);

			$sqlid = "select pp_id from petprofiles where pp_username = '$username';";
			$result = $con->query($sqlid);
			$row = $result->fetch_assoc();
			$id = $row['pp_id'];

			header('Location: petprofile.php?sitter='.$id);
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
				<input type="file" class="form-control-file" id="" name="imgupload">
			</div>

		    <!--Field 1&2-->
			<div class="form-group">
				<div class="col-md-6">
					<label>Pet Name</label>
					<input type="text" class="form-control" placeholder="Pet Name" name="petname">	
				</div>
			
				<div class="col-md-6">
					<label>Type</label>
					<input type="text" name="" class="form-control" placeholder="Type" name="pettype">
				</div>	
				<div class="col-md-6">
					<label>Breed</label>
					<input type="text" name="" class="form-control" placeholder="Breed" name="petbreed">
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
        			<a href="#" class="btn btn-block btn-primary btn-success" name="btn-createprofile"> Submit</a>
	 			</div>
			</div>
		</form>
	</div> 

</article>

<?php 
include "footer.php"; 
?>
