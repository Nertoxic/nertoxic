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
    echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
    echo "<script>console.log('');</script>";
    echo "<script>console.log('File: system/visitor/nicVisLoc.php');</script>";
    echo "<script>console.log('Ciritcal: No');</script>";
    echo "<script>console.log('Error: There was an error while loading the geolocation of the visitor, this module wont work now.');</script>";
    echo "<script>console.log('');</script>";
    echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
    die();
}

?>