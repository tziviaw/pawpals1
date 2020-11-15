<?php
class petlisting{
    static public function getListingDetails($petlistnum, $con){
        $sql = "select pl_id, pp_id, pp_img as img, petname, pettype, breed, size, pl_description as desc, 
        pl_neededfrom as neededfrom, pl_neededto as neededto
        from petlistings, petprofiles 
        where pl_id = 1 and pp_id = pl_id;";

        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $result;
    }

    static function createListing($description, $username, $petid, $dateneededfrom, $dateneededto, $con){
        $sql = "insert into petlistings (pl_username, pl_pp_id, pl_description, pl_neededfrom, 
                pl_neededto) 
                VALUES ('$username', $petid, '$description', '$dateneededfrom', '$dateneededto')";
               
        echo $sql;
        $result = $con->query($sql);
        return $result;
    }

}
?>