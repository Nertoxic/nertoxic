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

include BASE_PATH.'nicEnv.php'; # Load Env variables
include BASE_PATH.'nicVersion.php'; # Load NIC Version

# --------------------------------------------------------------------
# These files are core files, if these files doesnt work the whole system cant work correctly
# --------------------------------------------------------------------

include BASE_PATH.'nic/visitor/nicVisLoc.php'; # Load visitor tracking module [http://www.geoplugin.net]

# --------------------------------------------------------------------
# These files are basic files which adding some cool features to the framework
# --------------------------------------------------------------------

} 

catch (Exception $e) {

    include BASE_PATH.'app/nic/display/error_frame_loading.html';

}
?>