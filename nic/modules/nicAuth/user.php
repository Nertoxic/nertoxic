<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$user = new user();

class user Extends mysql 
{
    
    /*
    * Get a field value by userid
    */
    public function getField($userid, $field)
    {

        $GETFIELD = self::db()->prepare("SELECT * FROM `".$GLOBALS['NIC_AUTH_DATABASE']."` WHERE `id` = :userid");
        $GETFIELD->execute(array(":userid" => $userid));
        while ($user = $GETFIELD-> fetch(PDO::FETCH_ASSOC)){

            $returnValue = $user[''.$field.''];

        }

        return $returnValue;

    }

}
?>