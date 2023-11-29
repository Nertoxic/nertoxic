<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$nicConsoleErrorFile = "index.php";
$nicConsoleErrorCritical = "true";
$nicConsoleErrorDesc = "You need to set the entry point for your webhosting to the /public/ folder";
include 'nicLoader.php';
include BASE_PATH.'nic/core/nicConsole.php';
?>