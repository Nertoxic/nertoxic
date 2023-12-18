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
# Module: nicAuth
# Creator: Nertoxic (DevelopingFlakes)
# Desc: The heart of the authentication system!
# --------------------------------------------------------------------

$moduleIsActive = true;

if($moduleIsActive == true) {
    include MODULE_PATH.'nicAuth/auth.php';
    include MODULE_PATH.'nicAuth/user.php';
}
?>