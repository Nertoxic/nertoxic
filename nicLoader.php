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
$neededPHPVersion = '8.1';

$sessionToken = $_COOKIE['SESS'];

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

require CORE_PATH.'nicConsole.php'; # Load the Console
require BASE_PATH.'nicEnv.php'; # Load Env variables
require BASE_PATH.'nicVersion.php'; # Load NIC Version
require BASE_PATH.'vendor/autoload.php'; # Loa all vendor files

require CACHE_PATH.'load.php'; # Load all cache files

// Database loading
if($env['NIC_USED_DB'] == "mysql") {
    require DB_PATH.'MySQL/mysqlBuild.php';
}

require MODULE_PATH.'nicModules.php'; # Load all included modules
require SECURITY_PATH.'nicSecurity.php'; # Load the Security functions
require CORE_PATH.'nicFunctions.php'; # Load the Security functions

require HANDLER_PATH.'nicPageNameHandler.php'; # Manage page Namens

} catch (Exception $e) {
    $nicCon->callError(true, 'nicLoader.php', 'There was an error while loading the loader.');
}

# --------------------------------------------------------------------
# Error handling
# --------------------------------------------------------------------

if (version_compare(PHP_VERSION, $neededPHPVersion, '<')) 
{
    $console->callError(true, 'nicLoader.php', 'The Nertoxic Framework couldnt be loaded, you need at least the PHP Version '.$neededPHPVersion);
}

if($nic_version == NULL) {
    $console->callError(true, 'nicVerion.php', 'The backend couldnt read the nicVersion file, this might couse big problems if that error wont be fixed instantly.');
}

if($nic_version ==! )

/* Database isnt required
if($env['NIC_USED_DB'] == NULL) {
    $console->callError(true, 'nicLoader.php', 'The database type couldnt be loaded, check if the right value has been set inside the .env file.');
}
*/

/* Database isnt required
if($mysql == NULL) {
    $console->callError(true, 'nicLoader.php', 'The backend couldnt connect to the database correctly, please check your variables');
}
*/
?>