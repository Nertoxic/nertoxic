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

require BASE_PATH.'nicEnv.php'; # Load Env variables
require BASE_PATH.'nicVersion.php'; # Load NIC Version
include BASE_PATH.'nic/core/nicConsole.php'; # Load the Console

include BASE_PATH.'nic/handler/nicPageNameHandler.php'; # Manage page Namens

// Database loading
if($env['NIC_USED_DB'] == "mysql") {
    include BASE_PATH.'nic/database/MySQL/mysqlBuild.php';
}

include BASE_PATH.'nic/modules/nicModules.php'; # Load all included modules
include BASE_PATH.'nic/security/nicSecurity.php'; # Load the Security functions
include BASE_PATH.'nic/core/nicFunctions.php'; # Load the Security functions

} // try end

# --------------------------------------------------------------------
# Error handling
# --------------------------------------------------------------------

catch (Exception $e) {
    $nicCon->callError(true, 'nicLoader.php', 'The loader couldnt be loaded, this means the backend currently cant build up. Please check last edited files and check the php log');
}

if($nic_version == NULL) {
    $nicCon->callError(true, 'nicVerion.php', 'The backend couldnt read the nicVersion file, this might couse big problems if that error wont be fixed instantly.');
}

if($mysql == NULL) {
    $nicCon->callError(true, 'nicLoader.php', 'The backend couldnt connect to the database correctly, please check your variables');
}
?>