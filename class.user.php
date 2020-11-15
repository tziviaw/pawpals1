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
    }

?>