<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

if ($env === false) {

    $nicConsoleErrorFile = ".env";
    $nicConsoleErrorCritical = "true";
    $nicConsoleErrorDesc = "The .env couldnt be loaded, please check it for any errors and check your server console";
    include BASE_PATH.'nic/core/nicConsole.php';

} elseif($env == NULL) {

    $nicConsoleErrorFile = ".env";
    $nicConsoleErrorCritical = "true";
    $nicConsoleErrorDesc = "The .env couldnt be loaded, please check it for any errors and check your server console";
    include BASE_PATH.'nic/core/nicConsole.php';

} else {

    $NIC_LICENSE = $env['NIC_LICENSE'];
    $NIC_ENV_TYPE = $env['NIC_ENV_TYPE'];
    $NIC_BASE_URI = $env['NIC_BASE_URL'];

    $NIC_USED_DB = $env['NIC_USED_DB'];

    $NIC_MYSQL_HOST = $env['NIC_MYSQL_HOST'];
    $NIC_MYSQL_DB_NAME = $env['NIC_MYSQL_DB_NAME'];
    $NIC_MYSQL_USER_NAME = $env['NIC_MYSQL_USER_NAME'];
    $NIC_MYSQL_USER_PASS = $env['NIC_MYSQL_USER_PASS'];

}

?>