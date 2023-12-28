<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

ob_start(); # Turn on output buffering
session_start(); # Start a php session

# --------------------------------------------------------------------
# Setup path and default variables
#--------------------------------------------------------------------

$nicConsoleErrorFile = 0; # Set errors to NULL
$neededPHPVersion = '8.1'; # Set needed php version

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
require_once CORE_PATH.'nicConsole.php'; # Load the Console
require_once BASE_PATH.'nicEnv.php'; # Load Env variables
$sessionToken = $_COOKIE[''.$NIC_AUTH_COOKIE_NAME.'']; # Set Session Token

require_once BASE_PATH.'nicVersion.php'; # Load NIC Version
require_once BASE_PATH.'vendor/autoload.php'; # Loa all vendor files

// Cache System
require_once CORE_PATH.'nicCache.php'; # Load all cache functions
require_once CACHE_PATH.'load.php'; # Load all cached files

// Database loading
require_once DB_PATH.$env['NIC_USED_DB'].'Build.php'; # Load MYSQL Database

// Additional Stuff
require_once MODULE_PATH.'nicModules.php'; # Load all included modules
require_once SECURITY_PATH.'nicSecurity.php'; # Load the Security functions
require_once CORE_PATH.'nicFunctions.php'; # Load the Security functions

} catch (Exception $e) {
    $console->callError(true, 'nicLoader.php', 'There was an error while loading the loader.');
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

# --------------------------------------------------------------------
# Load the Page now
# --------------------------------------------------------------------

require_once BASE_PATH.'nicRouter.php'; # Load the router
?>