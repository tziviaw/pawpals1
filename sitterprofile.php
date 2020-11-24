<?php
	include "header.php";
	
	$sp_id = $_GET['sitter'];

	$sitter_details = $user->getSitterProfile($sp_id, $con);
	$image_show = $sitter_details['sp_img'];
	$sitter_availsun = $sitter_details['sp_sun'];
	$sitter_availmon = $sitter_details['sp_mon'];
	$sitter_availtue = $sitter_details['sp_tues'];
	$sitter_availwed = $sitter_details['sp_wed'];
	$sitter_availthurs = $sitter_details['sp_thurs'];
	$sitter_availfri = $sitter_details['sp_fri'];
	$sitter_availsat = $sitter_details['sp_sat'];

	// echo $_SESSION['profile'];
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
		
				<!--users.img-->
				<div class="profile-info">
					<table>
						<tr>
							<td class="text-left">Name:</td>
							<td><?php echo $sitter_details['fname']." ".$sitter_details['lname'] ?> </td>
							<!--concat(users.fname, " ", users.lname)-->
						</tr>
						<tr>
							<td class="text-left">Location:</td>
							<td><?php echo $sitter_details['zipcode'] ?> </td>
							<!--users.location-->
						</tr>
						<tr>
							<td class="text-left">Contact:</td>
							<td><?php echo $sitter_details['contact'] ?> </td>
							<!--users.contact-->
						</tr>
						<tr>
							<td class="text-left">Availabile:</td>
							<td></td>
						<tr>
							<td class="text-left">From:</td>
							<td><?php echo $sitter_details['sp_availablefrom'] ?></td>
							<!--sitterprofiles.sp_availablefrom-->
						</tr>
						<tr>
							<td class="text-left">To:</td>
							<td><?php echo $sitter_details['sp_availableto'] ?></td>
							<!--sitterprofiles.sp_availableto-->
						</tr>
						<tr>
							<td class="text-left">Days:</td>
							<td><?php user::getAvailability($sitter_availsun, $sitter_availmon, $sitter_availtue, $sitter_availwed, $sitter_availthurs, $sitter_availfri, $sitter_availsat, $con)?></td>
							<!--unknownFunc(sitterprofiles.sp_days)-->
						</tr>
					</table>
				</div>
			</section>
			<section class="col-sm-7">
				<div class="about-information">
					<h1>About Sitter</h1>
						<p><?php echo $sitter_details['sp_description'] ?></p>
						<!--sitterprofiles.sp_description-->
				</div>
			</section>
		</article>
	</div>
</article>
<?php
include "footer.php";
?>