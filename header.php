<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Homepage</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
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
						<a class="navbar-brand" href="index.php">Company Name</a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav button">
							<li><a href="sitterlistings.php" role="button"><p>Sitters</p></a></li>
							<li><a href="petlistings.php" role="button">Pets</a></li>
							<li><a href="sitterprofile.php" role="button">View Sitter Profile</a></li>
							<li><a href="petprofile.php" role="button">View Pet Profile</a></li>
							<li><a href="createprofile.php" role="button">Create a Pet Profile</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
							<li><a href="registerlogin.php" role="button"><span id="register-login-ico" class="glyphicon glyphicon-log-in"></span>Register/Login</a></li>
							</li>
					</ul>
					</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>