<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Pawpals</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

<script type="text/javascript">
	//keeps user-related-buttons or registerlogin-button from flickering on-screen before the user session is checked.
	//without these functions, however, flickering is only visible in desktop view.
	document.write('<style type="text/css">body{display:none}</style>');
	jQuery(function($) {
		$('body').css('display','block');
	});

	<?php
	include "db.php";
	include "class.user.php";
	
	session_start();
	$user = new user;
	
	include "registerloginlogic.php";
	
	$haspets = false;
	$mysp = [];
	
	if(isset($_SESSION["username"])){
		
		$username = $_SESSION["username"];
		
		$pets = user::getPets($username, $con);
		$mysp = user::getSitterDetails($username, $con);
		
		//set the $haspets flag based on the contents of $pets for use in the dropdown menu
		if(!empty($pets)){
			$haspets = true;
		}
	} else {
		$username = '';
	}
	
	?>
	
	//hides or shows a combination of user-related-buttons, registerlogin-button, my-pet-menu, and my-sitter-profile
	//based on the values of $_SESSION['username'], $haspets, and $has_sp_id
	function checkUserSession() {
		if ("<?php echo !empty($_SESSION['username']) ?>") {
			document.getElementById("registerlogin-button").style.display = "none";
			if (!"<?php echo $haspets ?>") {
				document.getElementById("my-pet-menu").style.display = "none";
			}
			if ("<?php echo empty($mysp) ?>") {
				document.getElementById("my-sitter-profile").style.display = "none";
			}
		} else {
			var x = document.getElementsByClassName("user-related-buttons");
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
		}
	}
	
	//calls checkUserSession()
	$(checkUserSession);
</script>

</head>
<body>
	<article class="main-container">
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">PawPals </a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav button">
							<li><a href="sitterlistings.php" role="button">Sitters</a></li>
							<li><a href="petlistings.php" role="button">Pets</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<li>
									<a id="registerlogin-button" href="registerlogin.php" role="button">
										<span id="register-login-ico" class="glyphicon glyphicon-log-in"></span>Register/Login
									</a>
								</li>
								<div class="dropdown user-related-buttons">
									<a id="my-profile-brand" href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">My Profile</a>
									<div id="my-profile" class="dropdown-menu">
										<ul>
											<li id="my-sitter-profile"><a href="sitterprofile.php?sitter=<?php echo $mysp["sp_id"] ?>" role="button">View Sitter Profile</a></li>
											<!-- displays links to pet profiles based on store values -->
											<div id="my-pet-menu">
												<li id="my-pet-menu-header"><label>My Pets</label></li>
												<?php
													foreach($pets as $pet) {
														//make a link for each pet the user has
														echo '<li><a href="petprofile.php?pet=' . $pet['pp_id'] . '" role="button">' . $pet["petname"] . '</a></li>';
													}
												?>
											</div>
											<li><a href="createprofile.php" role="button">Create a Pet Profile</a></li>
											<li><a href="logout.php" role="button">
												<span id="register-login-ico" class="glyphicon glyphicon-log-out"></span>Logout
											</a></li>
										</ul>
									</div>
								</div>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
