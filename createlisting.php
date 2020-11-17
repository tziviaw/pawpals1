<?php
session_start();

require_once('db.php');
require_once('class.petlisting.php');

print_r($_POST);

$username = 'user2';
$pp_id = $_POST['pp_id'];
$description = $_POST['description'];
$neededfrom = $_POST['neededfrom'];
$neededto = $_POST['neededto'];

petlisting::createListing($description, $username, $pp_id, $neededfrom, $neededto, $con);

header('Location: petlistings.php');