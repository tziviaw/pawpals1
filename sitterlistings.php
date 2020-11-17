<?php 
session_start();
$username = 'user1';

include "db.php";
include "class.user.php";
include "class.sitterlisting.php";
include "header.php"; 

$user = new user;
$listingob = new sitterlisting;

?>
	<!-- Sitters who are looking to sit pets -->
	<div class="container-fluid text-center">
		<h1>Sitters Looking for Work</h1>
	</div>
	
	<!--listings-->
	<!--retrieves all sitter profiles as listings-->

	<?php 
		$listings = $listingob->getListings($con);
		while($row = $listings->fetch_assoc()){
			$listing_img = $row['img'];
			$listing_username = $row['username'];
			$listing_name = $row['fullname'];
			$listing_description = $row['sp_description'];
			$listing_availablefrom = $row['sp_availablefrom'];
			$listing_availableto = $row['sp_availableto'];
			$listing_days = $row['sp_days'];
			$listing_contact = $row['contact'];
			$listing_id = $row['sp_id'];

	?>
	<div class="container text-center">
			<div class="row listing-row">
				<div class="col-md-3">
					<div class="profile-picture">
						<?php
						if($listing_img==''){
						echo '<a href="sitterprofile.php?pet=<?php echo $listing_id?>"><img src="images/profile-pic.jpg" alt="profile picture" class="img-rounded" height="120px"></a>';
						} 
						else{
							echo '<a href="sitterprofile.php?pet=<?php echo $listing_id?>"><img src="data:image/jpeg;base64,'.base64_encode($listing_img).'" class="listingimage" 
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
						<p><b>Days Available: </b> <?php $user->getAvailability($listing_days, $con);?></p>
						<p><b>Contact: </b> <?php echo $listing_contact?></p>

					</div>
				</div>
			</div>
	</div>
</article>
	<?php } ?>
<?php 
include "footer.php"; 
?>
