<?php 
session_start();
$username = 'user2';

// if(isset($SESSION['username'])){}

include "db.php";
include "class.user.php";
include "class.petlisting.php";
include "header.php"; 

$user = new user;
$listingob = new petlisting;

// $username = $_SESSION('username');

?>
		<div class="container-fluid text-center">
			<h1>Pets That Need Sitting</h1>
		</div>

		<!-- Holds button for form to create new listing-->
		<div class="container-fluid text-center">
		<button class="open-button" id="show-button" onclick="openForm(); getElementById('form-popup').style.display = 'block'; this.style.display = 'none'">Create New Listing</button>
		</div>

		<div class="form-popup container-fluid" id="listingForm">
		<!-- Listings form -->

		<form class="form-group form-container" action="createlisting.php" method="post">
			<div class="row">
				<div class="col-md-12">
					<label for="sel1">Pet</label>
					<select class="form-control" id="sel1" name="pp_id">
					<?php 
					$pets = user::getPets($username, $con);
					print_r($pets);
					foreach($pets as $pet) {
						echo "<option value=" . $pet["pp_id"] . ">" . $pet["petname"] . "</option>";
					}
					?>
					</select> 

				</div>	
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<label for="exampleFormControlTextarea1">Description</label>
					<textarea name="description" class="form-control" id="exampleFormControlTextarea1" placeholder="Description" rows="2" style="resize: vertical"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Date Needed From:</label>
					<input type="date" name="neededfrom" class="form-control" rows="1">
				</div>	
				<div class="col-md-6">
					<label>Date Needed To:</label>
					<input type="date" name="neededto" class="form-control" rows="1">
				</div>	
			</div>
			<div class="form-inline text-center">
				<button type="submit" class="submit-listing-btn">Post</button>
				<button type="submit" class="submit-cancel-btn" onclick="closeForm()">Close</button>
			</div>
		</form>

		</div>
		<!--listings-->
		<h3 class="text-center">Listings</h3>

		<!-- retrieves all listing data from database where start date is at least-->
		<?php
			$listings = $listingob->getListings($con);
			while($row = $listings->fetch_assoc()){
				$listing_img = $row['img'];
				$listing_pet = $row['petname'];
				$listing_ptype = $row['pettype'];
				$listing_breed = $row['breed'];
				$listing_size = $row['size'];
				$listing_description = $row['desc'];
				$listing_contact = $row['contact'];
				$listing_neededfrom = $row['pl_neededfrom'];
				$listing_neededto = $row['pl_neededto'];
				$listings_id = $row['pl_id'];
				$listings_petid = $row['pp_id'];

		?>		

		<!--pictures need to have links to the respective profile page-->
		<div class="container text-center">
			<!-- <a class="profile-link" href="petprofile.php"> -->
				<div class="row listing-row">
					<div class="col-md-3">
						<div class="profile-picture">
							<?php
							if($listing_img==''){
								echo '<a href="petprofile.php?pet=<?php echo $listing_petid?>"><img src="images/profile-pic.jpg" alt="profile picture" class="img-rounded" height="120px"></a>';
							}
							else{
								echo '<a href="petprofile.php?pet=<?php echo $listing_petid?>"><img src="data:image/jpeg;base64,'.base64_encode($listing_img).'" class="listingimage" 
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
							<p><b>Contact: 	</b> <?php echo $listing_contact?></p>
						</div>
					</div>
				</div>
			<!-- </a> -->
		</div>
	</article>
	<?php } ?>
		
<?php 
include "footer.php"; 
?>

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>

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
		var r = confirm("Are you sure you want to submit");

		if(r==true){
		
		var jqxhr = $.post( "createlisting.php", function() {
		alert("Submission Successful.");
		})
		.fail(function() {
			alert( "error" );
		});
	}

	})
</script>
