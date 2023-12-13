<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$env = parse_ini_file('.env');

if ($env === false) {
    $console->callError(true, 'nicEnv.php', 'The .env file couldnt be loaded, please check the file for any errors.');
} else {
    // Basic env Variables that need to be global available
    $APP_NAME = $env['APP_NAME'];
    $APP_LOGO = $env['APP_LOGO'];
    
    $NIC_BASE_URL = $env['NIC_BASE_URL'];
    $NIC_LICENSE = $env['NIC_LICENSE'];

    // Database Variables that need to be global available
    $NIC_MYSQL_HOST = $env['NIC_MYSQL_HOST'];
    $NIC_MYSQL_DB_NAME = $env['NIC_MYSQL_DB_NAME'];
    $NIC_MYSQL_USER_NAME = $env['NIC_MYSQL_USER_NAME'];
    $NIC_MYSQL_USER_PASS = $env['NIC_MYSQL_USER_PASS'];

    // Mailing Variables that need to be global available
    $NIC_MS_URL = $env['NIC_MS_URL'];
    $NIC_MS_SENDER = $env['NIC_MS_SENDER'];
    $NIC_MS_PASSWORD = $env['NIC_MS_PASSWORD'];
    $NIC_MS_PORT = $env['NIC_MS_PORT'];

    // Auth variables that need to be global available
    $NIC_AUTH_RETURN_ERROR = $env['NIC_AUTH_RETURN_ERROR'];
    $NIC_AUTH_REGISTER = $env['NIC_AUTH_ALLOW_REGISTER'];
    $NIC_AUTH_REDERICT_LOGIN = $env['NIC_AUTH_REDERICT_LOGIN'];
    $NIC_AUTH_REDERICT_REGISTER = $env['NIC_AUTH_REDERICT_REGISTER'];
    $NIC_AUTH_FORCE_MAIL_VERIFY = $env['NIC_AUTH_FORCE_MAIL_VERIFY'];
    $NIC_AUTH_MAIL_VERIFY_PAGE = $env['NIC_AUTH_MAIL_VERIFY_PAGE'];
    $NIC_AUTH_FORCE_MAIL_VERIFY = $env['NIC_AUTH_FORCE_MAIL_VERIFY'];

    // Inv variables that need to be global available
    $NIC_INV_MOLLIE_KEY = $env['NIC_INV_MOLLIE_KEY'];
    $NIC_INV_PAYMENT_SUCCESS_PAGE = $env['NIC_INV_PAYMENT_SUCCESS_PAGE'];
}

?>