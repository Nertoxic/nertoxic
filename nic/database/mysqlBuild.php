<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

# --------------------------------------------------------------------
# Load the mysql Database
# --------------------------------------------------------------------

$mysql = new mysql();
class mysql
{
    public function db()
    {

        $dbHost = $GLOBALS['NIC_MYSQL_HOST'];
        $dbName = $GLOBALS['NIC_MYSQL_DB_NAME'];
        $dbUser = $GLOBALS['NIC_MYSQL_USER_NAME'];
        $dbPass = $GLOBALS['NIC_MYSQL_USER_PASS'];

        $db = new PDO('mysql:host=' . $dbHost . ';charset=utf8;dbname=' . $dbName, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}

?>