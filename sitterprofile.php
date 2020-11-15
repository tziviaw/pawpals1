<?php 
include "header.php"; 
?>


	<div class="container">
		<article class="row">
			<section class="col-sm-5">
			<!--blank header tag to provide top spacing equal to about-information-->
			<h1></h1>
				<img src="https://via.placeholder.com/250" class="img-responsive" alt="Profile Name"/>
				<!--users.img-->
				<div class="profile-info">
					<table>
						<tr>
							<td class="text-left">Name:</td>
							<td>John Fakename</td>
							<!--concat(users.fname, " ", users.lname)-->
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
							<td class="text-left">Availabile:</td>
							<td></td>
						<tr>
							<td class="text-left">From:</td>
							<td>XX:XX XM</td>
							<!--sitterprofiles.sp_availablefrom-->
						</tr>
						<tr>
							<td class="text-left">To:</td>
							<td>XX:XX XM</td>
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
						<p>Information about the profile user goes here.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
						It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						<!--sitterprofiles.sp_description-->
				</div>
			</section>
		</article>
	</div>
</article>

<?php 
include "footer.php"; 
?>
