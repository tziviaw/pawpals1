<?php
	include "header.php";
	
	$pp_id = $_GET['pet'];
	
	$pet_details = $user->getPetProfile($pp_id, $con);
	
	$image_show = $pet_details['pp_img'];
?>


	<div class="container">
		<article class="row">
			<section class="col-sm-5">
				<!--blank header tag to provide top spacing equal to about-information-->
				<h1></h1>
				<div class="profile-img text-center">
					<?php
					if($image_show==''){
							echo '<img src="images/profile-pic.jpg"  alt="<?php echo $username ?>" style="width: 250px; height: 250px;"/>';
						}
						else{
					echo '<img src="data:image;base64,'.base64_encode($image_show).'" alt="<?php echo $username ?>"/>';
					}
					?>
				</div>

				<!--petprofiles.pp_img-->
				<div class="profile-info">
					<table>
						<tr>
							<td class="text-left">Name:</td>
							<td><?php echo $pet_details['petname'] ?></td>
							<!--petprofiles.petname-->
						</tr>
						<tr>

							<td class="text-left">Location:</td>
							<td><?php echo $pet_details['zipcode'] ?></td>
							<!--users.location-->
						</tr>
						<tr>
							<td class="text-left">Contact:</td>
							<td><?php echo $pet_details['contact'] ?></td>
							<!--users.contact-->
						</tr>
						<tr>
							<td class="text-left">Pet Type:</td>
							<td><?php echo $pet_details['pettype'] ?></td>
							<!--petprofiles.pettype-->
						</tr>
						<tr>
							<td class="text-left">Breed:</td>
							<td><?php echo $pet_details['petname'] ?></td>
							<!--petprofiles.breed-->
						</tr>
						<tr>
							<td class="text-left">Size:</td>
							<td><?php echo $pet_details['size'] ?></td>
							<!--petprofiles.size-->
						</tr>
					</table>
				</div>
			</section>
			<section class="col-sm-7">
				<div class="about-information">
					<h1>About <?php echo $pet_details['petname'] ?></h1>
					<p> <?php echo $pet_details['pp_description'] ?> </p>
					
					<!--petprofiles.pp_description-->
				</div>
			</section>
		</article>
	</div>
</article>

<?php
include "footer.php";
?>

