<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

# --------------------------------------------------------------------
# Internal page types
# --------------------------------------------------------------------

if($nicPageType == "module_test") {
    if($nicModuleOutput_example == true) {
        include BASE_PATH.'nic/out/success_module_system.html';
    } else {
        $nicConsoleErrorFile = "nicLoader.php";
        $nicConsoleErrorCritical = "true";
        $nicConsoleErrorDesc = "The module System isnt working, please check the folder /nic/modules/*";
        include BASE_PATH.'nic/core/nicConsole.php';
    }
}

if($nicPageType == "setuped") {
    include BASE_PATH.'nic/out/default.html';
}

if($nicPageType == "framework_test") {
    if($nicConsoleErrorFile == NULL) {
        include BASE_PATH.'nic/out/success_framework.html';
    }
}
