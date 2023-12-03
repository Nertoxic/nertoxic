<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

// console.warn/log/error/debug

if($nicConsoleErrorCritical == "true") {

    echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
    echo "<script>console.log('');</script>";
    echo "<script>console.log('File: ".$nicConsoleErrorFile."');</script>";
    echo "<script>console.log('Ciritcal: ".$nicConsoleErrorCritical."');</script>";
    echo "<script>console.error('Error: ".$nicConsoleErrorDesc."');</script>";
    echo "<script>console.log('');</script>";
    echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";

    include BASE_PATH.'nic/out/error.html';
    die();

} else {

    echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
    echo "<script>console.log('');</script>";
    echo "<script>console.log('File: ".$nicConsoleErrorFile."');</script>";
    echo "<script>console.log('Ciritcal: ".$nicConsoleErrorCritical."');</script>";
    echo "<script>console.warn('Error: ".$nicConsoleErrorDesc."');</script>";
    echo "<script>console.log('');</script>";
    echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
    
}

?>