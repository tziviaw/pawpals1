<?php 
include "header.php"; 
?>

<article class="main-container">		
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
					<label>Pet Name</label>
					<input type="text" class="form-control" placeholder="Pet Name">	
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
        			<a href="#" class="btn btn-block btn-primary btn-success"> Submit</a>
	 			</div>
			</div>
		</form>
	</div> 

</article>

<?php 
include "footer.php"; 
?>