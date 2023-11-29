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

    include BASE_PATH.'nic/out/error_env_not_loaded.html';
    echo "<script>console.log('[NERTOXIC] The .env file inside the base-path couldnt be loaded, please check if the file contains error and is placed correctly' );</script>";
    die();

} else {

    $NIC_LICENSE = $env['NIC_LICENSE'];
    $NIC_ENV_TYPE = $env['NIC_ENV_TYPE'];
    $NIC_BASE_URI = $env['NIC_BASE_URL'];

}

?>