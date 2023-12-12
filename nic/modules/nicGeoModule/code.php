<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#


$clientGeo_pl = json_encode(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$clientAddr));
$clientGeo = $clientGeo_pl[0]['geoplugin_request'];
var_dump($clientGeo);