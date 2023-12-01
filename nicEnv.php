<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$env = parse_ini_file('.env');

if ($env === false) {
    $nicConsoleErrorFile = "nicEnv.php";
    $nicConsoleErrorCritical = "true";
    $nicConsoleErrorDesc = "The .env file couldnt be loaded, please check the file for any errors.";
    include BASE_PATH.'nic/core/nicConsole.php';
} else {
    $NIC_MYSQL_HOST = $env['NIC_MYSQL_HOST'];
    $NIC_MYSQL_DB_NAME = $env['NIC_MYSQL_DB_NAME'];
    $NIC_MYSQL_USER_NAME = $env['NIC_MYSQL_USER_NAME'];
    $NIC_MYSQL_USER_PASS = $env['NIC_MYSQL_USER_PASS'];
}

?>