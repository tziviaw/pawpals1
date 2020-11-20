<?php
session_start();
include "header.php";
if(isset($_SESSION['username'])){

	include "db.php";
	include "class.user.php";
	
	$userob = new user();
	
	$username = $_SESSION['username'];

	$username = "";
	if(isset($_GET['user'])){
		$username = trim($_GET['user']);
	}
	else{
		$username = $_SESSION['username'];
	} 
	
	$user_details = $userob->getUserDetails($username, $con);

	$sitter_details = $userob->getSitterDetails($username, $con);

	$image_show = $user_details['img'];

?>


	<div class="container">
		<article class="row">
			<section class="col-sm-5">
			<!--blank header tag to provide top spacing equal to about-information-->
			<h1></h1>
			<?php
				if($image_show==''){
					echo '<img src="images/users.png" class="pull-left img-profile" alt="' . $username . '" id="profileImage" />';

					}
					else{
				echo '<img src="data:image;base64,'.base64_encode($image_show).'" alt="' . $username . '" id="profileImage" />';
				}
				?>
		
				<!--users.img-->
				<div class="profile-info">
					<table>
						<tr>
							<td class="text-left">Name:</td>
							<td><?php echo $user_details['fname'] ?> </td>
							<!--concat(users.fname, " ", users.lname)-->
						</tr>
						<tr>
							<td class="text-left">Location:</td>
							<td><?php echo $user_details['zipcode'] ?> </td>
							<!--users.location-->
						</tr>
						<tr>
							<td class="text-left">Contact:</td>
							<td><?php echo $user_details['contact'] ?> </td>
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
							<td>Sun, Mon, Tue, Wed, Thu, Fri, Sat</td>
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
}
else{
	header("Location:index.php");
}
?>
