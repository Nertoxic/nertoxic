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