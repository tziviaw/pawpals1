<?php
	class petlisting{
			static public function getListings($con){
					$sql = "select pl_id, pp_id, pp_img as 'img', petname, pettype, breed, size, pl_description as 'desc', contact,
					pl_neededfrom, pl_neededto
					from petlistings, petprofiles, users 
					where pp_id = pl_pp_id 
					and username = pp_username
					order by pl_datecreated desc;";

					$result = $con->query($sql) or die($con->error);
					return $result;
			}

			static function createListing($description, $username, $petid, $dateneededfrom, $dateneededto, $con){
					$sql = "insert into petlistings (pl_username, pl_pp_id, pl_description, pl_neededfrom, 
									pl_neededto) 
									VALUES ('$username', $petid, '$description', '$dateneededfrom', '$dateneededto')";
								 
					echo $sql;
					$result = $con->query($sql) or die($con->error);
					return $result;
			}

			static function filterListing($search, $con){
					$sql = "select pl_id, pp_id, pp_img as 'img', petname, pettype, breed, size, pl_description as 'desc', contact,
					pl_neededfrom, pl_neededto
					from petlistings, petprofiles, users 
					where (pp_id = pl_pp_id 
					and username = pp_username)
					and (pettype like '$search' or breed like '$search' or size like '$search' or pl_description like '$search')
					order by pl_datecreated desc;";

					$result = $con->query($sql) or die($con->error);
					return $result;
			}

	}
?>
