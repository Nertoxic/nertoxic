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

if($sessionToken == NULL) {} else {

    $USERDATA = $mysql->db()->prepare("SELECT * FROM `".$NIC_AUTH_DATABASE."` WHERE `session` = :session");
    $USERDATA->execute(array(":session" => $sessionToken));
    while ($user = $USERDATA -> fetch(PDO::FETCH_ASSOC)){

        // nicAuth Module
        $userid = $user['id'];
        $username = $user['username'];
        $usermail = $user['usermail'];
        $usermail_verified = $user['mail_verified'];
        $userbalance = $user['amount'];
        $mailcode = $user['mail_verify_code'];

        // nicAuth Mail Verify
        if($NIC_AUTH_FORCE_MAIL_VERIFY == 'true') {
            if($usermail_verified == 'false') {
                if($_GET['re'] == "yes") {} else {
                    header("Location: ".$NIC_BASE_URL.$NIC_AUTH_MAIL_VERIFY_PAGE."?re=yes");
                }
            }
        }

        // nicInvoicing

    }

}

# --------------------------------------------------------------------
# load html stuff
# --------------------------------------------------------------------

/*
* Load the front page
*/
if(strpos($currPage,'front_') !== false) {
    include ASSETS.'front/head.php';
    include ASSETS.'front/header.php';
}

/*
* Load the auth page
*/
if(strpos($currPage,'auth_') !== false) {

    if($sessionToken ==! NULL) {
        header("Location:".$NIC_BASE_URL);
    }

    include ASSETS.'auth/head.php';
    include ASSETS.'auth/header.php';
}

/*
* Load the back page
*/
if(strpos($currPage,'back_') !== false) {

    if($sessionToken == NULL) {
        header("Location:".$NIC_BASE_URL);
    }

    include ASSETS.'back/head.php';
    include ASSETS.'back/header.php';
}