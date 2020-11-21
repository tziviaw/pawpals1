<?php
session_start();

require_once('db.php');
require_once('class.petlisting.php');

print_r($_POST);

$username = $_SESSION['username'];
$pp_id = $_POST['pp_id'];
$description = $_POST['description'];
$neededfrom = $_POST['neededfrom'];
$neededto = $_POST['neededto'];

if ($username==""||$pp_id==""||$description==""||$neededfrom==""||$neededto==""){
    header('Location: petlistings.php');
}
else{
    petlisting::createListing($description, $username, $pp_id, $neededfrom, $neededto, $con);

    header('Location: petlistings.php');
}