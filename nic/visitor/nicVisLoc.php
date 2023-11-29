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
    $nicConsoleErrorFile = "system/visitor/nicVisLoc.php";
    $nicConsoleErrorCritical = "false";
    $nicConsoleErrorDesc = "The geolocation module couldnt be loaded, this might couse problems within the login process if there are variables based on this module, otherwhise you can ignore this error.";
    include BASE_PATH.'nic/core/nicConsole.php';
}

?>