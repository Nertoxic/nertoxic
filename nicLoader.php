<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

define('BASE_PATH', __DIR__.'/');
$nicConsoleErrorFile = 0;

try {

# --------------------------------------------------------------------
# Include files
#--------------------------------------------------------------------

include BASE_PATH.'nicEnv.php'; # Load Env variables
include BASE_PATH.'nicVersion.php'; # Load NIC Version
include BASE_PATH.'nic/handler/nicPageNameHandler.php'; # Manage page Namens

// Database loading
if($env['NIC_USED_DB'] == "mysql") {
    include BASE_PATH.'nic/database/MySQL/mysqlBuild.php';
}

include BASE_PATH.'nic/modules/nicModules.php'; # Load all included modules

} // try end

# --------------------------------------------------------------------
# Error handling
# --------------------------------------------------------------------

catch (Exception $e) {
    $nicConsoleErrorFile = "nicLoader.php";
    $nicConsoleErrorCritical = "true";
    $nicConsoleErrorDesc = "The loader couldnt be loaded, this means the backend currently cant build up. Please check last edited files and check the php log";
    include BASE_PATH.'nic/core/nicConsole.php';
}

if($nic_version == NULL) {
    $nicConsoleErrorFile = "nicVerion.php";
    $nicConsoleErrorCritical = "true";
    $nicConsoleErrorDesc = "The backend couldnt read the nicVersion file, this might couse big problems if that error wont be fixed instantly.";
    include BASE_PATH.'nic/core/nicConsole.php';
}

if($mysql ==! NULL) {
    $nicConsoleErrorFile = "nicLoader.php";
    $nicConsoleErrorCritical = "false";
    $nicConsoleErrorDesc = "The backend couldnt connect to the database correctly, please check your variables";
    include BASE_PATH.'nic/core/nicConsole.php';
}
?>