<?php 
include "class.sitterlisting.php";
include "header.php"; 

$listingob = new sitterlisting;
$filter = @$_GET['search'];

?>
	<div class="container-fluid text-right">
		<form id="filter-form" action="sitterlistings.php" method = "get" style="display: inline-flex">
			<input type="search" name="search" id="q" placeholder="search"rows="1" style="width: 150px" value="<?=$filter?>"></input>
			&nbsp; 
			<button type="submit" option = "pet" class="submit-search-btn"><span class="glyphicon glyphicon-search"></span></button>
		</form>
	</div>

	<!-- Sitters who are looking to sit pets -->
	<div class="container-fluid text-center">
		<h1>Sitters Looking for Work</h1>
	</div>
	
<?php 
	$listings = sitterlisting::filterListing($filter, $con);

	if (count($listings) == 0) {
		echo '<div class="container text-center">
			<div class="row listing-row">
			No Listings
			</div>
			</div>';
	} 
		// $listings = $listingob->getListings($con);
		foreach($listings as $row){
			$listing_img = $row['img'];
			$listing_username = $row['username'];
			$listing_name = $row['fullname'];
			$listing_description = $row['sp_description'];
			$listing_availablefrom = $row['sp_availablefrom'];
			$listing_availableto = $row['sp_availableto'];
			// $listing_days = $row['sp_days'];
			$listing_sun = $row['sp_sun'];
			$listing_mon = $row['sp_mon'];
			$listing_tues = $row['sp_tues'];
			$listing_wed = $row['sp_wed'];
			$listing_thurs = $row['sp_thurs'];
			$listing_fri = $row['sp_fri'];
			$listing_sat = $row['sp_sat'];
			$listing_contact = $row['contact'];
			$listing_zipcode = $row['zipcode'];
			$listing_id = $row['sp_id'];

	?>
	<div class="container-fluid text-center">
			<div class="row listing-row">
				<div class="col-md-3">
					<div class="profile-picture">
						<?php
						if($listing_img==''){
						echo '<a href="sitterprofile.php?sitter=' . $listing_id . '"><img src="images/profile-pic.jpg" alt="profile picture" class="img-rounded" height="120px"></a>';
						} 
						else{
							echo '<a href="sitterprofile.php?sitter=' . $listing_id . '"><img src="data:image/jpeg;base64,'.$listing_img.'" class="listingimage" 
							alt="profile picture height="120px" style="width: 120px; height: 120px;" /></a>';
						}
						?>
						</br>
						<h4><?php echo $listing_name?></h4>
					</div>
				</div>
				<div class="col-md-6">
					<div class="listing-details">
						<p><b>Description: </b> <?php echo $listing_description?></p>
					</br>
						<p><b>Available From: </b> <?php echo $listing_availablefrom?></p>
						<p><b>Available To: </b> <?php echo $listing_availableto?></p>
						<p><b>Days Available: </b> <?php $user->getAvailability($listing_sun, $listing_mon, $listing_tues, $listing_wed, $listing_thurs, $listing_fri, $listing_sat, $con);?></p>
						<p><b>Zipcode Location: </b> <?php echo $listing_zipcode?></p>
						<p><b>Contact: </b> <?php echo $listing_contact?></p>

					</div>
				</div>
			</div>
	</div>
	<?php } ?>
	</article>
<?php 
include "footer.php"; 
?>