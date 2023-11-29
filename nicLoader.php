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

try {

# --------------------------------------------------------------------
# These files are core file assists, if these files doesnt work some of the core files wont even start working
#--------------------------------------------------------------------

#include BASE_PATH.'nicEnv.php'; # Load Env variables
include BASE_PATH.'nicVersion.php'; # Load NIC Version

# --------------------------------------------------------------------
# These files are core files, if these files doesnt work the whole system cant work correctly
# --------------------------------------------------------------------

#include BASE_PATH.'nic/visitor/nicVisLoc.php'; # Load visitor tracking module [http://www.geoplugin.net]

# --------------------------------------------------------------------
# These files are basic files which adding some cool features to the framework
# --------------------------------------------------------------------

} 


# --------------------------------------------------------------------
# Error handling
# --------------------------------------------------------------------

catch (Exception $e) {

    include BASE_PATH.'app/nic/display/error_frame_loading.html';
    echo "<script>console.log('[NERTOXIC] There was an error while loading the nicLoader.php, please check it for errors and check if every file is at the correct path' );</script>";
    die();

}

if($nic_version == NULL) {
    include BASE_PATH.'app/nic/display/error_frame_loading.html';
    echo "<script>console.log('[NERTOXIC] There was an error while reading the file nicVersion.php, please check if the file is placed at the base_path' );</script>";
    die();
}
?>