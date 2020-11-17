<?php
    class user{
        static function getPets($username, $con){
            $sql = "select pp_id, petname from petprofiles pp
            where pp.pp_username = '$username'";

            $result = $con->query($sql);
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
    }

?>