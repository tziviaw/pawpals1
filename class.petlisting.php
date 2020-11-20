<?php
class petlisting{
    static public function getListings($con){
        $sql = "select pl_id, pp_id, pp_img as 'img', petname, pettype, breed, size, zipcode, pl_description as 'desc', contact,
        pl_neededfrom, pl_neededto
        from petlistings, petprofiles, users 
        where pl_neededfrom >= CURRENT_DATE 
        and pp_id = pl_pp_id 
        and username = pp_username
        order by pl_datecreated desc;";

        $result = $con->query($sql);
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

    static function filterListing($filter, $con){
        $sql = "select pl_id, pp_id, pp_img as 'img', petname, pettype, breed, zipcode, size, pl_description as 'desc', contact,
        pl_neededfrom, pl_neededto
        from petlistings, petprofiles, users 
        where (pp_id = pl_pp_id 
        and username = pp_username)
        and pl_neededfrom >= CURRENT_DATE
        and (pettype like '%$filter%' or breed like '%$filter%' or size like '%$filter%' or pl_description like '%$filter%' or CAST(zipcode AS CHAR) like '%$filter%')
        order by pl_datecreated desc;";

        $result = $con->query($sql);
        $rows = [];
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

}
?>