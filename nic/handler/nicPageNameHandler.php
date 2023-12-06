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
        include OUT_PATH.'success_module_system.html';
    } else {
        $nicCon->callError(true, 'nicLoader.php', 'The module System isnt working, please check the folder /nic/modules/*');
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
    if($nicMail ==! NULL) {
        include OUT_PATH.'success_database.html';
    }
}