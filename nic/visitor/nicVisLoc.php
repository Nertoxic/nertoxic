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
    echo "<script>console.log('---------------------- [NERTOXIC] ----------------------' );</script>";
    echo "<script>console.log('[NERTOXIC] Non-Critical: There was an error while loading geoLocation Informations about the visitor' );</script>";
    echo "<script>console.log('---------------------- [NERTOXIC] ----------------------' );</script>";
    die();
}

?>