<?php

/*
 * page manager
 */
$pages = BASE_PATH.'app/pages/';
$auth = BASE_PATH.'app/pages/auth/';

if(isset($_GET['page'])) {
    switch ($page) {

        default: include($pages . "404.php");  break;
        case "auth_login": include($auth . "login.php");  break;

    }

    if(strpos($currPage,'system_') !== false || strpos($currPage,'_hidelayout') !== false) {} else {
        include BASE_PATH.'/resources/additional/footer.php';
    }

} else {
    die('please enable .htaccess on your server');
}