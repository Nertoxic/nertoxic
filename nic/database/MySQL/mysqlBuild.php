<?php

// Create Settings
$mysql = new mysql();
class mysql
{
    public function db()
    {

        $dbHost = $GLOBALS['NIC_MYSQL_HOST'];
        $dbName = $GLOBALS['NIC_MYSQL_DB_NAME'];
        $dbUser = $GLOBALS['NIC_MYSQL_USER_NAME'];
        $dbPass = $GLOBALS['NIC_MYSQL_USER_PASS'];

        // TESTING
        /*
        $dbHost = 'localhost';
        $dbName = 'nicTestDB';
        $dbUser = 'nicTestDB_user';
        $dbPass = '#n562hMb3';
        */

        $db = new PDO('mysql:host=' . $dbHost . ';charset=utf8;dbname=' . $dbName, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}

?>