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
# Setup base values
# --------------------------------------------------------------------

$page = $_GET['page'];

# --------------------------------------------------------------------
# Start loading called pages
# --------------------------------------------------------------------

if(isset($_GET['page'])) {

    /*
    * Include requested page
    */
    include(BASE_PATH."app/pages/".$_GET['page'].".php");

    /*
    * If page doesnt respond the right code
    */
    if($currPage == NULL) {
        $console->callError(true, 'nicRouter.php', 'The file couldnt be loaded correctly.');
    }

    /*
    * Include different footers
    */
    if(strpos($currPage,'front_') == true) {
        include BASE_PATH.'storage/assets/front/footer.php';
    }

    if(strpos($currPage,'back_') == true) {
        include BASE_PATH.'storage/assets/back/footer.php';
    }

    if(strpos($currPage,'auth_') == true) {
        include BASE_PATH.'storage/assets/auth/footer.php';
    }

} else {
    $console->callError(true, "nicRoter.php", "The Router couldnt be loaded, please enable .httaccess or check it for errors");
}