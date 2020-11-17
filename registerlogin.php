<?php 
include "header.php"; 
?>
		<div class="container">
		<div class="row">
		<div class="col-md-12">
			<div id="first">
				<div class="myform form">
					<div class="logo">
						<div class="text-center">
							<h1>Login</h1>
						</div>
					</div>
					<form action="" method="post" name="login" id="login">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label> <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label> <input type="password" name="password" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Password" style="text-decoration: none">
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-block mybtn btn-primary">LOGIN</button>
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
					<form action="#" name="registration" id="registration">
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label> <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Last Name</label> <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" aria-describedby="emailHelp">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label> <input type="email" name="email" class="form-control" id="email" placeholder="Email" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label> <input type="text" name="username" class="form-control" id="username" placeholder="Username" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label> <input type="password" name="password" class="form-control" id="password" placeholder="Password" aria-describedby="emailHelp" style="text-decoration: none">
						</div>
						<div class="form-group">
							<label for="exampleFormControlFile1">Profile Type</label><br> <input type="radio" name="choice-profile" id="choice-profile-sitter"> <label for="choice-profile-sitter">Sitter</label> <input type="radio" name="choice-profile" id="choice-profile-pet"> <label for="choice-profile-pet">Pet</label> <input type="radio" name="choice-profile" id="choice-profile-both"> <label for="choice-profile-pet">Both</label>
								<div class="form-group">
									<label for="exampleFormControlFile1">Upload picture</label> <input type="file" class="form-control-file" id="exampleFormControlFile1">
								</div>
								<div class="form-group">
									<label>Zipcode</label> <input type="text" class="form-control" placeholder="12345">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Contact Number</label> <input type="contactnumber" name="" class="form-control" placeholder="123-456-7890">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Availability</label><br>
									<form action="/action_page.php">
										<input type="checkbox" id="monday" name="monday" value="Monday"> <label for="monday">Monday</label><br>
										<input type="checkbox" id="tuesday" name="tuesday" value="Tuesday"> <label for="tuesday">Tuesday</label><br>
										<input type="checkbox" id="wednesday" name="wednesday" value="Wednesday"> <label for="wednesday">Wednesday</label><br>
										<input type="checkbox" id="thursday" name="thursday" value="Thursday"> <label for="thursday">Thursday</label><br>
										<input type="checkbox" id="friday" name="friday" value="Friday"> <label for="friday">Friday</label><br>
										<input type="checkbox" id="saturday" name="saturday" value="Saturday"> <label for="saturday">Saturday</label><br>
										<input type="checkbox" id="sunday" name="sunday" value="Sunday"> <label for="sunday">Sunday</label><br>
									</form>
								</div>
							
							<div class="text-center">
								<button type="submit" class="btn btn-block mybtn btn-primary">REGISTER</button>
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
    
<?php 
include "footer.php"; 
?>
