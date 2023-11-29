<?php

// Create Settings
$mysql = new mysql();
class mysql
{
    public function db()
    {

        $nicmysqlhost = $NIC_MYSQL_HOST

        $dbHost = $nicmysqlhost;
        $dbName = ""; // The name of the database
        $dbUser = ""; // The username of the admin database account
        $dbPass = ""; // The password for the user ^

        $db = new PDO('mysql:host=' . $dbHost . ';charset=utf8;dbname=' . $dbName, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}

?>