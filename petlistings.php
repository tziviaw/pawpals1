<?php 
session_start();

// if(isset($SESSION['username'])){}

include "db.php";
include "class.user.php";
include "class.petlisting.php";
include "header.php"; 

$user = new user;
$listingob = new petlisting;

// $username = $_SESSION('username');

?>
	<!--page header-->
	<div class="container-fluid text-center">
		<h1>Pets That Need Sitting</h1>
	</div>
	
	<!--create listing-->
	<div class="text-center">
	<label>Create Listing:</label>
	</div>
	<div class="container-fluid">
	<!-- Listings form -->
	<form class="form-group" action="createlisting.php" method="post">
		<div class="row">
			<div class="col-md-4">
				<label for="sel1">Pet</label>
				<select class="form-control" id="sel1" name="pp_id">
				<?php 
				$pets = user::getPets('user1', $con);
				print_r($pets);
				foreach($pets as $pet) {
					echo "<option value=" . $pet["pp_id"] . ">" . $pet["petname"] . "</option>";
				}
				?>
				</select> 

			</div>	
		</div>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="exampleFormControlTextarea1">Description</label>
				<textarea name="description" class="form-control" id="exampleFormControlTextarea1" placeholder="Description" rows="2" style="resize: vertical"></textarea>
			</div>
		</div>
		<div class="row">
		<div class="col-md-2">
				<label>Date Needed From:</label>
				<input type="date" name="neededfrom" class="form-control" rows="1">
			</div>	
			<div class="col-md-2">
				<label>Date Needed To:</label>
				<input type="date" name="neededto" class="form-control" rows="1">
			</div>	
		</div>
	</div>	
		<div class="form-inline text-center">
		</br>
			<button type="submit" class="submit-listing-btn">Post</button>
		</div>
</form>
	
	<!--listings-->
	<h3 class="text-center">Listings</h3>

	<!-- retrieves all listing data from database -->
	<?php
		$listings = $listingob->getListingDetails(1, $con);
		while($listings->fetch_assoc()){
			$listing_img = $row['pp_img'];
			$listing_pet = $row['petname'];
			$listing_type = $row['pettype'];
			$listing_breed = $row['breed'];
			$listing_size = $row['size'];
			$listing_description = $row['desc'];
			$listing_neededfrom = $row['neededfrom'];
			$listing_neededto = $row['neededto'];
			$listings_id = $row['pl_id'];
			$listings_petid = $row['pp_id'];
		}

	?>		

	</div>

	<!--pictures need to have links to the respective profile page-->
	<div class="container text-center">
		<a class="profile-link" href="petprofile.php">
			<div class="row listing-row">
				<div class="col-md-3">
					<div class="profile-picture">
						<img class="img-rounded" src="images/profile-pic.jpg" height="120px">
						<?php
						if($listing_img==''){
							echo '<img src="images/profile-pic.png" alt="profile picture" class="pull-left img-rounded" height="120px">';
						}
						else{
							echo '<img src="data:image;base64,'.base64_encode($listing_img).'" class="pull-left listingimage" alt="profile picture" />';
						}
						?>
						<h3><a href = "petprofile.php?user=<?php echo $listings_petid ?>$p"></a></h3>
					</div>
					<!-- stopped here: resume here -->
				</div>
				<div class="col-md-6">
					<div class="listing-details">
						<table class="listing-details">
							<tr>
								<td>Description: </td> 
								<td class="listing-content"> </td>
							</tr>
						
						</table>
						
						<p>Description: </p>
					</div>
				</div>
			</div>
		</a>
		
		<a class="profile-link" href="petprofile.php">
			<div class="row listing-row">
				<div class="col-md-3">
					<div class="profile-picture">
						<img class="img-rounded" src="images/profile-pic.jpg" height="120px">
						<p>Pname</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="listing-details">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</div>
				</div>
			</div>
		</a>
		
		<a class="profile-link" href="petprofile.php">
			<div class="row listing-row">
				<div class="col-md-3">
					<div class="profile-picture">
						<img class="img-rounded" src="images/profile-pic.jpg" height="120px">
						<p>Pname</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="listing-details">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</div>
				</div>
			</div>
		</a>
	
	</div>
</article>

<?php 
include "footer.php"; 
?>

