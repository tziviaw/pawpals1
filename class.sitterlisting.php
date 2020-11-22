<?php
class sitterlisting{
    static public function getListings($con) {
        $sql = "select sp_id, username, CONCAT(fname, ' ', lname) as 'fullname', sp_description, 
        sp_availablefrom, sp_availableto, sp_days, contact, zipcode, img
        from users, sitterprofiles
        where username = sp_username;";

        $result = $con->query($sql) or die($con->error);
        return $result;
    }

    static public function filterListing($filter, $con) {


        $sql = "select sp_id, username, CONCAT(fname, ' ', lname) as 'fullname', sp_description, 
        sp_availablefrom, sp_availableto, sp_sun, sp_mon, sp_tues, sp_wed, sp_thurs, sp_fri, sp_sat, contact, zipcode, img
        from users, sitterprofiles
        where username = sp_username
        and (username like '%$filter%' or 'fullname' like '%$filter%' or sp_description like '%$filter%'
        or CAST(zipcode AS CHAR) like '%$filter%');";

        $result = $con->query($sql) or die($con->error);
        $rows = [];
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }
}

?>