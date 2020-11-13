<?php 
include "header.php"; 
?>

<article class="main-container">
	<div class="container">
		<article class="row">
			<section class="col-sm-5">
				<!--blank header tag to provide top spacing equal to about-information-->
				<h1></h1>
				<img src="https://via.placeholder.com/250" class="img-responsive" alt="Profile Name"/>
				<!--petprofiles.pp_img-->
				<div class="profile-info">
					<table>
						<tr>
							<td class="text-left">Name:</td>
							<td>Fido</td>
							<!--petprofiles.petname-->
						</tr>
						<tr>
							<td class="text-left">Location:</td>
							<td>XXXXX, XX</td>
							<!--users.location-->
						</tr>
						<tr>
							<td class="text-left">Contact:</td>
							<td>XXX-XXX-XXXX</td>
							<!--users.contact-->
						</tr>
						<tr>
							<td class="text-left">Pet Type:</td>
							<td>Dog</td>
							<!--petprofiles.pettype-->
						</tr>
						<tr>
							<td class="text-left">Breed:</td>
							<td>German Shepherd</td>
							<!--petprofiles.breed-->
						</tr>
						<tr>
							<td class="text-left">Size:</td>
							<td>Medium</td>
							<!--petprofiles.size-->
						</tr>
					</table>
				</div>
			</section>
			<section class="col-sm-7">
				<div class="about-information">
					<h1>About Pet</h1>
					<p>Information about the profile user goes here.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
					It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					<!--petprofiles.pp_description-->
				</div>
			</section>
		</article>
	</div>
</article>

<?php 
include "footer.php"; 
?>
