<?php
include "header.php"; 
include "class.petlisting.php";

$listingob = new petlisting;
$filter = @$_GET['search'];

?>

	<div class="container-fluid text-right">
		<form id="filter-form" action="petlistings.php" method = "get" style="display: inline-flex">
			<input type="search" name="search" id="q" placeholder="search"rows="1" style="width: 150px" value="<?=$filter?>"></input>
			&nbsp; <button type="submit" option = "pet" class="submit-search-btn"><span class="glyphicon glyphicon-search"></span></button>
		</form>
	</div>

	<div class="container-fluid text-center">
		<h1>Pets That Need Sitting</h1>
	</div>
	<?php if ($username == ''){
		echo '<div class="container-fluid text-center"><a href="registerlogin.php"> Sign In or Register to create a new listing </a></div>';
	} else{
		if($_SESSION['profile'] = 'sitter'){
			echo '<div class="container-fluid text-center"><a href="creatprofile.php"> Create a Pet Profile to create a new listing </a></div>';
		}
		else{?>


	<!-- Holds button for form to create new listing-->
	<div class="container-fluid text-center createlisting">
	<button class="open-button" id="show-button" onclick="openForm(); getElementById('form-popup').style.display = 'block'; this.style.display = 'none'">Create New Listing</button>
	</div>
		<?php }?>
	<div class="form-popup container-fluid" id="listingForm">
	<!-- Listings form -->

	<form class="form-group form-container" action="createlisting.php" method="post">
		<div class="row">
			<div class="col-md-12">
				<label for="sel1" id="formpet">Pet</label>
				<select class="form-control" id="sel1" name="pp_id">
				<?php 
				$pets = user::getPets($username, $con);
				print_r($pets);
				echo '<option value=""</option>';
				foreach($pets as $pet) {
					echo "<option value=" . $pet["pp_id"] . ">" . $pet["petname"] . "</option>";
				}
				?>
				</select> 
			</div>	
		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<label for="exampleFormControlTextarea1"> Description</label>
				<textarea name="description" class="form-control" id="description" placeholder="Description" rows="2" style="resize: vertical"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label>Date Needed From:</label>
				<input type="date" name="neededfrom" id="neededfrom" class="form-control" rows="1">
			</div>	
			<div class="col-md-6">
				<label>Date Needed To:</label>
				<input type="date" name="neededto" id = "neededto" class="form-control" rows="1">
			</div>	
		</div>
		<div class="form-inline text-center">
			<button type="submit" class="submit-listing-btn">Post</button>
			<button type="submit" class="submit-cancel-btn" onclick="closeForm()">Close</button>
		</div>
	</form>
<?php }?>


	</div>

	<!-- retrieves all listing data from database where start date is at least-->
	<?php

		$listings = petlisting::filterListing($filter, $con);

		if (count($listings) == 0) {
			echo '<div class="container text-center nolistings">
				<div class="row listing-row">
				No Listing Results
				</div>
				</div>';
		}
		foreach($listings as $row) {
			$listing_img = $row['img'];
			$listing_pet = $row['petname'];
			$listing_ptype = $row['pettype'];
			$listing_breed = $row['breed'];
			$listing_size = $row['size'];
			$listing_description = $row['desc'];
			$listing_contact = $row['contact'];
			$listing_zipcode = $row['zipcode'];
			$listing_neededfrom = $row['pl_neededfrom'];
			$listing_neededto = $row['pl_neededto'];
			$listings_id = $row['pl_id'];
			$listings_petid = $row['pp_id'];

	?>		

	<!--pictures need to have links to the respective profile page-->
	<div class="container-fluid text-center">
		<!-- <a class="profile-link" href="petprofile.php"> -->
			<div class="row listing-row">
				<div class="col-md-3">
					<div class="profile-picture">
						<?php
						if($listing_img==''){
							echo '<a href="petprofile.php?pet=' . $listings_petid . '"><img src="images/profile-pic.jpg" alt="profile picture" class="img-rounded" height="120px"/></a>';
						}
						else{
							echo'<a href="petprofile.php?pet=' . $listings_petid . '"><img src="data:image/jpeg;base64,'.base64_encode($listing_img).'" class="listingimage" 
							alt="profile picture height="120px" style="width: 120px; height: 120px;" /></a>';
						}
						?>
						</br>
						<h4><?php echo $listing_pet ?></h4>
				</div>
			</div>
				<div class="col-md-6">
					<div class="listing-details">
						<p><b>Description:	</b> <?php echo $listing_description ?></p>
					</br>
						<p><b>Pet Type: 	</b>	<?php echo $listing_ptype ?> </p>
						<p> <b>Pet Breed: 	</b>	<?php echo $listing_breed ?></p>
						<p><b>Pet Size: 	</b>	<?php echo $listing_size ?></p>
					</br>
						<p><b>Needed From:	</b> <?php echo $listing_neededfrom ?></p>
						<p><b>Needed To: 	</b>	<?php echo $listing_neededto?></p>
						<p><b>Zipcode Location: </b> <?php echo $listing_zipcode?></p>
						<p><b>Contact: 	</b> <?php echo $listing_contact?></p>
					</div>
				</div>
			<!-- </a> -->
		</div>
	</div>
	<?php } ?>
	</article>	
<?php 
include "footer.php"; 
?>

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

<!--script for opening/closing the create new listing form -->
<script>
	function openForm() {
		$('#show-button').hide();
		$('#listingForm').show();
	}

	function closeForm(){
		$('#listingForm').hide();
	}

</script>

</script>

<!-- Helps POST and alert user when form submission is successful and listing is created-->
<script>
	$('.submit-listing-btn').click(function(e){

		if ($('#sel1').val() == "" || $('#description').val() == ""
				|| $('#neededfrom').val() == "" || $('#neededto').val() == ""){
					alert("Fields cannot be blank.");
		}
		else{
		
		var r = confirm("Are you sure you want to submit");

		if(r==true){
		
		var jqxhr = $.post( "createlisting.php", function() {
		alert("Submission Successful.");
		})
		.fail(function() {
			alert( "Error Creating Listing" );
		});
		}
		}

	})
</script>