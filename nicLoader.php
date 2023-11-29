<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

try {

// nicLoader
define('BASE_PATH', __DIR__.'/');

} 

catch (Exception $e) {

    include BASE_PATH.'app/nic/display/error_frame_loading.html';

}
?>