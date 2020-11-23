<?php
include "header.php";
//registerlogin php code isolated in registerloginlogic.php and included near the top of header.php
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="first">
				<div class="myform form">
					<div class="logo">
						<div class="text-center">
							<h1>Login</h1>
							<p> <?php echo $finalstatus ?>
						</div>
					</div>
					<form method="post" action="registerlogin.php" name="login" id="login">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label> &nbsp;<span class="error"><?php echo $emailErr ?> <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label> &nbsp;<span class="error"><?php echo $passErr ?></span> <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Password" style="text-decoration: none">
						</div>
						<div class="text-center">
							<input type="submit" name="btn-login" class="btn btn-block mybtn btn-primary" value="Login" />
						</div>
						<div class="form-group">
							<p class="text-center">Don't have an account? <a href="#" id="signup">Register here</a></p>
						</div>
					</form>
				</div>
			</div>

			<div id="second">
				<div class="myform form">
					<div class="logo">
						<div class="text-center">
							<h1>Register</h1>
						</div>
					</div>
					<form method="post" action="registerlogin.php" enctype="multipart/form-data" name="registration" id="registration">
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label> <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" id="fname" placeholder="First Name" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Last Name</label> <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" id="lname" placeholder="Last Name" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label> <span class="error"> <?php echo $emailErr; ?> </span> <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" id="email" placeholder="Email" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label> <span class="error"> <?php echo $usernameErr; ?> </span> <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" id="username" placeholder="Username" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label> <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" id="password" placeholder="Password" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleFormControlFile1">Profile Type</label><br> 
								<input type="radio" name="choice-profile" id="choice-profile-sitter" value="sitter"> <label for="choice-profile-sitter">Sitter</label> 
								<input type="radio" name="choice-profile" id="choice-profile-pet" value="pet"> <label for="choice-profile-pet">Pet</label> 
								<input type="radio" name="choice-profile" id="choice-profile-both" value="both" checked> <label for="choice-profile-pet">Both</label>
							<!-- <div class="reveal-if-active"> -->
							<div class="form-group">
								<label for="exampleFormControlFile1">Upload picture</label> <input type="file" name="profileimage" class="form-control-file" id="exampleFormControlFile1">
							</div>
							<div class="form-group">
								<label>Zipcode</label> <input type="text" name="zipcode" class="form-control" placeholder="12345">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Contact Number</label> <input type="contactnumber" name="contact" class="form-control" placeholder="123-456-7890">
							</div>

							<!-- </div> -->

							<div class="text-center">
								<input type="submit" name="btn-register" value="REGISTER" class="btn btn-block mybtn btn-primary" />
							</div>

							<div>
								<div class="form-group">
									<p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</article>
<script src="js/registerlogin.js"></script>
<?php
include "footer.php";
?>