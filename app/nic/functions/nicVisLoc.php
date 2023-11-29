<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#              nicVisLoc
#       Nertoxic Visitor (Geo)Location

$geoLocation_plain = var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp? ip='.$_SERVER['REMOTE_ADDR'])));

?>