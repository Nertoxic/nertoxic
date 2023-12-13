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
# load user table
# --------------------------------------------------------------------

if(!$sessionToken == NULL) {

    $USERDATA = $mysql->db()->prepare("SELECT * FROM `users` WHERE `session` = :session");
    $USERDATA->execute(array(":session" => $sessionToken));
    while ($user = $USERDATA -> fetch(PDO::FETCH_ASSOC)){

        // nicAuth Module
        $userid = $user['id'];
        $username = $user['username'];
        $usermail = $user['usermail'];
        $usermail_verified = $user['mail_verified'];
        $userbalance = $user['amount'];

        // nicAuth Mail Verify
        echo($NIC_AUTH_FORCE_MAIL_VERIFY);
        echo($usermail_verified);
        if($NIC_AUTH_FORCE_MAIL_VERIFY == "true") {
            if($usermail_verified == false) {
                echo("Test");
                header("Location: ".$BASE_URL.$NIC_AUTH_MAIL_VERIFY_PAGE);
            }
        }

        // nicInvoicing

    }

}
# --------------------------------------------------------------------
# Global page types
# --------------------------------------------------------------------

if($nicPageType == "front") {
    // Load html/css/js
    require ASSETS.'front/head.php';
    require ASSETS.'front/header.php';
}

if($nicPageType == "back") {

    // Check if session token is empty
    if($sessionToken == NULL) {
        header("Location:".$NIC_BASE_URL);
    }

    // Load html/css/js
    require ASSETS.'back/head.php';
    require ASSETS.'back/header.php';

}

if($nicPageType == "auth") {

    // Check if session token is empty
    if(!$sessionToken == NULL) {
        header("Location:".$NIC_BASE_URL);
    }

    // Load html/css/js
    require ASSETS.'auth/head.php';
    require ASSETS.'auth/header.php';

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