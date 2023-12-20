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
# Load the Framework
# --------------------------------------------------------------------

#error_reporting(E_ALL);
error_reporting(E_ALL ^ E_WARNING && E_NOTICE); // Display own error reporting
ini_set('display_errors', 'On'); // ONLY USE IN DEV ENVOIREMENT

include_once '../nicLoader.php'; // Load the Framework

?>