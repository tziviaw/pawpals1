<?php
require_once('class.sitterlisting.php');
require_once('class.petlisting.php');

$filter = $_POST['filter'];
$option = trim($_POST['option']);

if ($option = 'petlisting'){
    petlisting::filterListing($filter, $con);
    header('Location: petlistings.php');
}
elseif ($option = 'sitterlisting') {
    sitterlisting::filterListing($filter, $con);
    header('Location: sitterlistings.php');
}
?>