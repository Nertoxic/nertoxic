<?php

/*
* Setup base values
*/
$page = $_GET['page'];

/*
 * Setup paths
 */
$pages = BASE_PATH.'app/pages/';
$auth = $pages.'auth/';

if(isset($_GET['page'])) {
    /*
    switch ($page) {

        default: include($pages . "404.php");  break;
        case "auth_login": include(BASE_PATH."app/pages/auth/login.php");  break;

    }
    */

    include(BASE_PATH."app/pages/auth/".$_GET['page'].".php");  break;

    if(strpos($currPage,'auth_') == true) {
        include BASE_PATH.'storage/assets/auth/footer.php';
    }

} else {
    die('please enable .htaccess on your server');
}