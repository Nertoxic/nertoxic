<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#


$geoData = var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$clientAddr)));
$geoAddr = $geoData['geoplugin_request'];