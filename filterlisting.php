<?php
session_start();

require_once('db.php');
require_once('class.sitterlisting.php');
require_once('class.petlisting.php');

$username = 'user2';
$filter = $_POST['filter'];
$option = trim($_POST['option']);

if ($option = 'petlisting'){
    petlisting::filterListing($filter, $con);
    header('Location: petlistings.php');
}
elseif ($option = 'sitterlisting') {
    sitterlisting::filterListing($filter, $con);
    header('Location: petlistings.php');
}


?>