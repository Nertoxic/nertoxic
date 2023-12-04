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
# Setup path and default variables
#--------------------------------------------------------------------

$nicConsoleErrorFile = 0;

define('BASE_PATH', __DIR__.'/');
define('CORE_PATH', __DIR__.'/nic/core/');
define('MODULE_PATH', __DIR__.'/nic/modules/');
define('SECURITY_PATH', __DIR__.'/nic/security/');
define('HANDLER_PATH', __DIR__.'/nic/handler/');
define('DB_PATH', __DIR__.'/nic/database/');

# --------------------------------------------------------------------
# Include files
#--------------------------------------------------------------------
try {

require BASE_PATH.'nicEnv.php'; # Load Env variables
require BASE_PATH.'nicVersion.php'; # Load NIC Version
require CORE_PATH.'nicConsole.php'; # Load the Console

require HANDLER_PATH.'nicPageNameHandler.php'; # Manage page Namens

// Database loading
if($env['NIC_USED_DB'] == "mysql") {
    require DB_PATH.'MySQL/mysqlBuild.php';
}

require MODULE_PATH.'nicModules.php'; # Load all included modules
require SECURITY_PATH.'nicSecurity.php'; # Load the Security functions
require CORE_PATH.'nicFunctions.php'; # Load the Security functions

} catch (Exception $e) {
    $nicCon->callError(true, 'nicLoader.php', 'There was an error while loading the loader.');
}

# --------------------------------------------------------------------
# Error handling
# --------------------------------------------------------------------

if($env['NIC_USED_DB'] == NULL) {
    $nicCon->callError(true, 'nicLoader.php', 'The database type couldnt be loaded, check if the right value has been set inside the .env file.');
}

if($nic_version == NULL) {
    $nicCon->callError(true, 'nicVerion.php', 'The backend couldnt read the nicVersion file, this might couse big problems if that error wont be fixed instantly.');
}

if($mysql == NULL) {
    $nicCon->callError(true, 'nicLoader.php', 'The backend couldnt connect to the database correctly, please check your variables');
}
?>