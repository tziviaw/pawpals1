<?php
class user
{
	static function getPets($username, $con)
	{
		$sql = "select pp_id, petname from petprofiles pp
            where pp.pp_username = '$username'";

		$result = $con->query($sql) or die($con->error);
		$pets = [];
		while ($row = $result->fetch_assoc()) {
			$pets[] = $row;
		};
		return $pets;
	}

	static function getAvailability($sun, $mon, $tues, $wed, $thurs, $fri, $sat, $con)
	{
		$arr = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
		$arrdays = array($sun, $mon, $tues, $wed, $thurs, $fri, $sat);
		// $search = $binarydays;
		// $search_arr = str_split($search);
		$result = array();
		foreach ($arrdays as $key => $value) {
			if ($value == 1) {
				$result[] = $arr[$key];
			}
		}
		echo implode(", ", $result);
	}

	static function getUserDetails($username, $con)
	{
		$sql = "select * from users where username='$username'";

		$result = $con->query($sql) or die($con->error);
		$row = $result->fetch_assoc();

		return $row;
	}

	static function getSitterDetails($username, $con)
	{
		$timeformat = '%r';
		$sql = "select sp_id, sp_username, sp_description, sp_datecreated, TIME_FORMAT(sp_availablefrom, '$timeformat') as sp_availablefrom, TIME_FORMAT(sp_availableto, '$timeformat') as sp_availableto, sp_sun, sp_mon, sp_tues, sp_wed, sp_thurs, sp_fri, sp_sat from sitterprofiles where sp_username ='$username'";
		// echo $sql;
		// exit;
		$result = $con->query($sql) or die($con->error);
		$row = $result->fetch_assoc();

		return $row;
	}

	static function getPetDetails($username, $pp_id, $con)
	{
		$sql = "select * from petprofiles where pp_username ='$username' and pp_id ='$pp_id'";

		$result = $con->query($sql) or die($con->error);
		$row = $result->fetch_assoc();

		return $row;
	}

	static function getPetProfile($pp_id, $con)
	{
		$sql = "select * from petprofiles join users on pp_username = username where pp_id ='$pp_id'";

		$result = $con->query($sql) or die($con->error);
		$row = $result->fetch_assoc();

		return $row;
	}

	static function getSitterProfile($sp_id, $con)
	{
		$timeformat = '%I:%i %p';
		$sql = "select username, email, fname, lname, contact, img, zipcode, sp_id, sp_username, sp_description, sp_datecreated, TIME_FORMAT(sp_availablefrom, '$timeformat') as sp_availablefrom, TIME_FORMAT(sp_availableto, '$timeformat') as sp_availableto, sp_sun, sp_mon, sp_tues, sp_wed, sp_thurs, sp_fri, sp_sat from sitterprofiles join users on sp_username = username where sp_id ='$sp_id'";

		$result = $con->query($sql) or die($con->error);
		$row = $result->fetch_assoc();

		return $row;
	}

	static function updateUserPet($user, $con){
		$sql = "UPDATE users
				SET hasPet = 1
				WHERE username = '$user';";
		$result = $con->query($sql) or die($con->error);
		
	}
	//$sql = "select * from users where username='$username'";
	//$sql = "select * from sitterprofiles where sp_username ='$username'";
}
