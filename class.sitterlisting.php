<?php
class sitterlisting{
    static public function getListings($con){
        $sql = "select sp_id, username, CONCAT(fname, ' ', lname) as 'fullname', sp_description, 
        sp_availablefrom, sp_availableto, sp_days, contact, img
        from users, sitterprofiles
        where username = sp_username;";

        $result = $con->query($sql);
        return $result;
    }
}

?>