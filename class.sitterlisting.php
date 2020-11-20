<?php
class sitterlisting{
    static public function getListings($con){
        $sql = "select sp_id, username, CONCAT(fname, ' ', lname) as 'fullname', sp_description, 
        sp_availablefrom, sp_availableto, sp_days, contact, zipcode, img
        from users, sitterprofiles
        where username = sp_username;";

        $result = $con->query($sql);
        return $result;
    }

    static public function filterListing($filter, $con){
        $sql = "select sp_id, username, CONCAT(fname, ' ', lname) as 'fullname', sp_description, 
        sp_availablefrom, sp_availableto, sp_days, contact, zipcode, img
        from users, sitterprofiles
        where username = sp_username
        and (username like '%$filter%' or 'fullname' like '%$filter%' or sp_description like '%$filter'
        or sp_days like '%$filter%' or zipcode like '%$filter%');";

        $result = $con->query($sql);
        return $result;
    }
}

?>