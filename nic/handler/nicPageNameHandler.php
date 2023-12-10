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
# Global page types
# --------------------------------------------------------------------

if($nicPageType == "front") {
    // Load html/css/js
    require STORAGE.'assets/front/head.html';
    require STORAGE.'assets/front/header.html';
}

if($nicPageType == "back") {
    // Load html/css/js
    require STORAGE.'assets/back/head.html';
    require STORAGE.'assets/back/header.html';
}

if($nicPageType == "auth") {
    if(!$sessionToken == NULL) {
        header("Location:".$NIC_BASE_URL);
    }

    // Load html/css/js
    require STORAGE.'assets/auth/head.html';
    require STORAGE.'assets/auth/header.html';
}

# --------------------------------------------------------------------
# Internal page types
# --------------------------------------------------------------------

if($nicPageType == "module_test") {
    if($nicModuleOutput_example == true) {
        include OUT_PATH.'success_module_system.html';
    } else {
        $console->callError(true, 'nicLoader.php', 'The module System isnt working, please check the folder /nic/modules/*');
    }
}

if($nicPageType == "setuped") {
    include OUT_PATH.'default.html';
}

if($nicPageType == "framework_test") {
    if($nicConsoleErrorFile == NULL) {
        include OUT_PATH.'success_framework.html';
    }
}

if($nicPageType == "database_test") {
    if($mysql ==! NULL) {
        include OUT_PATH.'success_database.html';
    }
}

if($nicPageType == "mailer_test") {
}