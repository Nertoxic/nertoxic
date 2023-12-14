<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

define('SYSTEM_START', microtime(true));
ob_start();
session_start();

# --------------------------------------------------------------------
# Setup path and default variables
#--------------------------------------------------------------------

$nicConsoleErrorFile = 0;
$neededPHPVersion = '8.1';

if($_COOKIE['SESS'] == NULL) {
    $sessionToken = NULL;
} else {
    $sessionToken = $_COOKIE['SESS'];
}

define('BASE_PATH', __DIR__.'/');
define('CORE_PATH', __DIR__.'/nic/core/');
define('MODULE_PATH', __DIR__.'/nic/modules/');
define('SECURITY_PATH', __DIR__.'/nic/security/');
define('HANDLER_PATH', __DIR__.'/nic/handler/');
define('DB_PATH', __DIR__.'/nic/database/');
define('OUT_PATH', __DIR__.'/nic/out/');
define('ASSETS', __DIR__.'/storage/assets/');
define('CACHE_PATH', __DIR__.'/storage/cache/');

# --------------------------------------------------------------------
# Include files
#--------------------------------------------------------------------
try {

// Basic Stuff
require CORE_PATH.'nicConsole.php'; # Load the Console
require BASE_PATH.'nicEnv.php'; # Load Env variables
require BASE_PATH.'nicVersion.php'; # Load NIC Version
require BASE_PATH.'vendor/autoload.php'; # Loa all vendor files

// Cache System
require CORE_PATH.'nicCache.php'; # Load all cache functions
require CACHE_PATH.'load.php'; # Load all cached files

// Database loading
require DB_PATH.'MySQL/'.$env['NIC_USED_DB'].'Build.php';

// Additional Stuff
require MODULE_PATH.'nicModules.php'; # Load all included modules
require SECURITY_PATH.'nicSecurity.php'; # Load the Security functions
require CORE_PATH.'nicFunctions.php'; # Load the Security functions

// Routing Stuff
require BASE_PATH.'nicRouter.php'; # Load the router

} catch (Exception $e) {
    $nicCon->callError(true, 'nicLoader.php', 'There was an error while loading the loader.');
}

# --------------------------------------------------------------------
# Error handling
# --------------------------------------------------------------------

if (version_compare(PHP_VERSION, $neededPHPVersion, '<')) {
    $console->callError(true, 'nicLoader.php', 'The Nertoxic Framework couldnt be loaded, you need at least the PHP Version '.$neededPHPVersion);
}

if (version_compare(PHP_VERSION, $neededPHPVersion, '=')) {
    $console->callError(false, 'nicLoader.php', 'The PHP Version you are using will be outdated soon. Please be sure to update the version bevore the support ends.');
}

if($nic_version == NULL) {
    $console->callError(true, 'nicVerion.php', 'The backend couldnt read the nicVersion file, this might couse big problems if that error wont be fixed instantly.');
}

// JUST FOR TESTING!
$nic_version_needed_id = $nic_version_id;
$nic_version_needed = 1;
// JUST FOR TESTING!

if($nic_version_needed == NULL) {
    if($nicPageType == "crone") {} else {
        $console->callError(true, 'nicLoader', 'You didnt setuped the Crone right, please check the docs.');
    }
}

if($nic_version_id < $nic_version_needed_id) {
    if($nicPageType == "crone") {} else {
        $console->callError(true, 'nicLoader.php', 'You are not using the required Version of the Framework, take a look at https://docs.nertoxic.com/versions#support-table');
    }
}

/* Database isnt required
if($env['NIC_USED_DB'] == NULL) {
    $console->callError(true, 'nicLoader.php', 'The database type couldnt be loaded, check if the right value has been set inside the .env file.');
}

if($mysql == NULL) {
    $console->callError(true, 'nicLoader.php', 'The backend couldnt connect to the database correctly, please check your variables');
}
*/

define('SYSTEM_END', round(microtime(true) - SYSTEM_START,4));
?>