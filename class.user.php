<?php
    class user{
        static function getPets($username, $con){
            $sql = "select pp_id, petname from petprofiles pp
            where pp.pp_username = '$username'";

            $result = $con->query($sql) or die($con->error);
            $pets = [];
            while($row = $result->fetch_assoc()) {
                $pets[] = $row;
            };
            return $pets;
        }

				static function getAvailability($binarydays, $con){
						$arr = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
						
						$search = $binarydays;
						$search_arr = str_split($search);
						$result = array();
						foreach($search_arr as $key => $value){
								if($value == 1){
										$result[] = $arr[$key];
								}
						}
						echo implode(", ", $result);
				}

				function getUserDetails($username, $con){
						$sql = "select * from users where username='$username'";

						$result = $con->query($sql) or die($con->error);
						$row = $result->fetch_assoc();

						return $row;
				}

				function getSitterDetails($username, $con){
						$sql = "select * from sitterprofiles where sp_username ='$username'";
						
						$result = $con->query($sql) or die($con->error);
						$row = $result->fetch_assoc();
						
						return $row;
				} 
				
				function getPetDetails($username, $pp_id, $con){
						$sql = "select * from petprofiles where pp_username ='$username' and pp_id ='$pp_id'";
						
						$result = $con->query($sql) or die($con->error);
						$row = $result->fetch_assoc();
						
						return $row;
				}
				
				function getPetProfile($pp_id, $con){
						$sql = "select * from petprofiles join users on pp_username = username where pp_id ='$pp_id'";
						
						$result = $con->query($sql) or die($con->error);
						$row = $result->fetch_assoc();
						
						return $row;
				}
				
				function getSitterProfile($sp_id, $con){
						$sql = "select * from sitterprofiles join users on sp_username = username where sp_id ='$sp_id'";
						
						$result = $con->query($sql) or die($con->error);
						$row = $result->fetch_assoc();
						
						return $row;
				}
				//$sql = "select * from users where username='$username'";
				//$sql = "select * from sitterprofiles where sp_username ='$username'";
    }
?>