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
# These files are core files, without them the framework wouldnt work
#--------------------------------------------------------------------

include BASE_PATH.'nicEnv.php'; # Load Env variables
include BASE_PATH.'nicVersion.php'; # Load NIC Version
include BASE_PATH.'nic/handler/nicPageNameHandler.php'; # Manage page Namens

# --------------------------------------------------------------------
# These files are basic files which adding some cool features to the framework
# --------------------------------------------------------------------

if($NIC_MYSQL_HOST == "mysql") {
    include BASE_PATH.'nic/database/MySQL/mysqlBuild.php';
}

# --------------------------------------------------------------------
# Load modules now
# --------------------------------------------------------------------

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

if($db ==! NULL) {
    $nicConsoleErrorFile = "nicLoader.php";
    $nicConsoleErrorCritical = "true";
    $nicConsoleErrorDesc = "The backend couldnt connect to the database correctly, please check your variables";
    include BASE_PATH.'nic/core/nicConsole.php';
}
?>