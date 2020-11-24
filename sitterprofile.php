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

<section class="col-sm-5">
	<!--blank header tag to provide top spacing equal to about-information-->
	<h1></h1>
	<div class="profile-img text-center">
		<?php
		if ($image_show == '') {
			echo '<img src="images/profile-pic.jpg"  alt="<?php echo $username ?>" style="width: 250px; height: 250px;"/>';
		} else {
			echo '<img src="data:image;base64,' . base64_encode($image_show) . '" alt="<?php echo $username ?>"/>';
		}
		?>
	</div>

	<!--users.img-->
	<div class="profile-info">
		<table>
			<tr>
				<td class="text-left">Name:</td>
				<td><?php echo $sitter_details['fname'] . " " . $sitter_details['lname'] ?> </td>
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
				<td><?php user::getAvailability($sitter_availsun, $sitter_availmon, $sitter_availtue, $sitter_availwed, $sitter_availthurs, $sitter_availfri, $sitter_availsat, $con) ?></td>
				<!--unknownFunc(sitterprofiles.sp_days)-->
			</tr>
		</table>
		</br>
		<?php if (!isset($_SESSION['username'])) {
			echo '<div class = "container-fluid text-center"><td><a href="registerlogin.php"> Sign in or Register to leave a review </a></div>';
		} else {
			echo '<div class="container-fluid text-center"><a href="createreview.php?sitter=' . $sp_id . '" style="color:blue; font-weight: bold; font-size: 140%;"> Review this Sitter </a></div>';
			
		}
		?>
	</div>
</section>

<section class="col-sm-7">
	<div class="about-information">
		<h1>About Sitter</h1>
		<div class="text-center">
		<h3>Description</34>
		</div>
		<p><?php echo $sitter_details['sp_description'] ?></p>
		<!--sitterprofiles.sp_description-->
	</div>

	<?php
	$reviews = user::getReviews($sp_id, $con);
	if (count($reviews) != 0) { ?>
		<div class="container-fluid text-center">
			<div class="row listing-row">
				<div class="col-sm-12">
					<h3>   Reviews</h3>
					<?php foreach ($reviews as $row) {
						$review_reviewer = $row['sr_reviewer'];
						$review_content = $row['sr_description'];
						$review_rate = $row['sr_rate']; ?>
						<div class="col-md-12">
							<div class="listing-details">
								<h4><?php echo $review_reviewer . " says:" ?></h4>
								<p><?php echo $review_content ?></p>
								<p><?php echo 'Rating: ' . $review_rate; ?></p>
							</div>
						</div>
						<?php } ?>
				</div>
			</div>
		</div>
<?php } ?>
</section>
</article>
<?php
include "footer.php";
?>