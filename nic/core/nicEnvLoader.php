<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

if ($env === false) {

    include BASE_PATH.'app/nic/display/error_env_not_loaded.html';
    die();

} else {

    $NIC_LICENSE = $env['NIC_LICENSE'];
    $NIC_ENV_TYPE = $env['NIC_ENV_TYPE'];
    $NIC_BASE_URI = $env['NIC_BASE_URL'];

}

?>