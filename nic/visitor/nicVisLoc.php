<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

#$geoLocation_plain = var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp? ip='.$_SERVER['REMOTE_ADDR'])));

if($geoLocation_plain == NULL) {
    # Place to insert html error
    $nicConsoleErrorFile = "system/visitor/nicVisLoc.php";
    $nicConsoleErrorCritical = "false";
    $nicConsoleErrorDesc = "There was an error while loading the geolocation of the visitor, this module wont work now";
    include BASE_PATH.'nic/core/nicConsole.php';
    die();
}

?>