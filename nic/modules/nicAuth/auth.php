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
# load default values
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
# load classes stuff
# --------------------------------------------------------------------

$auth = new auth();

class auth Extends mysql 
{

    /*
     * Create a new user
     * 
     * $usermail can be left on 0
     */
    public function register($username, $usermail, $password, $passwordRepeat)
    {

        // Set default values
        $authSuccess = true;
        $authFeedback = "";

        // Check if password is doubled
        if($password !== $passwordRepeat) {
            $authSuccess = false;
            $authFeedback = "The Passwords arent matching, please check them";
        }

        // Check if Register is allowed
        if($GLOBALS['NIC_AUTH_REGISTER'] == "false") {
            $authSuccess = false;
            $authFeedback = "The Registration isnt enabled at the moment.";
        }

        // Check if the email is already in use
        $MAILUSED = self::db()->prepare("SELECT * FROM `".$GLOBALS['NIC_AUTH_DATABASE']."` WHERE `usermail` = :usermail");
        $MAILUSED->execute(array(
            ":usermail" => $usermail
        ));

        if(!$MAILUSED->rowCount() == NULL) {
            $authSuccess = false;
            $authFeedback = "This E-Mail is already in use!";
        }

        // Check if the username is already in use
        $NAMEUSED = self::db()->prepare("SELECT * FROM `".$GLOBALS['NIC_AUTH_DATABASE']."` WHERE `username` = :username");
        $NAMEUSED->execute(array(
            ":username" => $username
        ));

        if(!$NAMEUSED->rowCount() == NULL) {
            $authSuccess = false;
            $authFeedback = "The Username is already in use!";
        }

        // Check if auth was success
        if($authSuccess == true) {

            $password_en = password_hash($password, PASSWORD_DEFAULT);

            $CREATE_USER = self::db()->prepare("INSERT INTO `".$GLOBALS['NIC_AUTH_DATABASE']."` SET `username` = :username, `usermail` = :usermail, `password` = :password");
            $CREATE_USER->execute(array(
                ":username" => $username,
                ":usermail" => $usermail,
                ":password" => $password_en
            ));
        }

        // Print error if user enabled it
        if($GLOBALS['NIC_AUTH_RETURN_ERROR'] == 'true') {
            print($authFeedback);
        }

        // Return true / false
        header("Location:".$GLOBALS['NIC_BASE_URL'].$GLOBALS['NIC_AUTH_REDERICT_REGISTER']);
        return $authSuccess;

    }
    
    /*
     * Login into account
     */
    public function login($username, $password)
    {

        // Set default values
        $authSuccess = true;
        $authFeedback = "";

        // Check if username is empty
        if(empty($username)) {
            $authSuccess = false;
            $authFeedback = "The username must be provided";
        }

        // Check if password is empty
        if(empty($password)) {
            $authSuccess = false;
            $authFeedback = "The password must be provided";
        }

        // Get user Data
        $LOGINUSER = self::db()->prepare("SELECT * FROM `".$GLOBALS['NIC_AUTH_DATABASE']."` WHERE `username` = :username");
        $LOGINUSER->execute(array(":username" => $username));
        while ($user = $LOGINUSER -> fetch(PDO::FETCH_ASSOC)){

            $checkPass = password_verify($password, $user['password']);
            if(!$checkPass == 1) {
                $authSuccess = false;
                $authFeedback = "The password isnt correct, please check it.";
            }
    
        }

        // If no user was found
        if($LOGINUSER->rowCount() == NULL) {
            $authSuccess = false;
            $authFeedback = "The user couldnt be found";
        }

        // Print error if user enabled it
        if($GLOBALS['NIC_AUTH_RETURN_ERROR'] == 'true') {
            print($authFeedback);
        }

        // If success
        if($authSuccess == true) {

            $length = 32;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $sessiontoken .= $characters[random_int(0, $charactersLength - 1)];
            }

            $INSERTSESS = self::db()->prepare("UPDATE `".$GLOBALS['NIC_AUTH_DATABASE']."` SET `session` = :sesstoken WHERE `username` = :username");
            $INSERTSESS->execute(array(":sesstoken" => $sessiontoken, ":username" => $username));

            setcookie(''.$GLOBALS['NIC_AUTH_COOKIE_NAME'].'', $sessiontoken, time()+'864000', '/');
            header("Location:".$GLOBALS['NIC_BASE_URL'].$GLOBALS['NIC_AUTH_REDERICT_LOGIN']);
        }

        // Return true / false
        return $authSuccess;

    }

    /*
     * Log user out
     */
    public function logout($token)
    {

        $authSuccess = true;

        // Check if session is empty
        if(empty($token)) {
            $authSuccess = false;
            $authFeedback = "The Session token cant be empty";
        }

        // Remove cookie
        if($authSuccess == true) {
            unset($_COOKIE[''.$GLOBALS['NIC_AUTH_COOKIE_NAME'].'']);
            setcookie(''.$GLOBALS['NIC_AUTH_COOKIE_NAME'].'', '', -1, '/');
        }

        // Rederict user and return
        if(!isset($_COOKIE[''.$GLOBALS['NIC_AUTH_COOKIE_NAME'].''])) {
            header("Location:".$GLOBALS['NIC_BASE_URL']);
        } else {
            echo("Error while logging user out, couldnt remove cookie!");
        }
        return $authSuccess;
    }

    
    /*
     * Verify users mail
     */
    public function verifyMail($usermail)
    {

        $VERIFYMAIL = self::db()->prepare("UPDATE `".$GLOBALS['NIC_AUTH_DATABASE']."` set `mail_verified` = 'true' WHERE `usermail` = :usermail");
        $VERIFYMAIL->execute(array(":usermail" => $usermail));

        return true;
    }

    /*
     * Generate Mail Code
     */
    public function saveVerifyCode($userid)
    {

        $length = 12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $generatedCode .= $characters[random_int(0, $charactersLength - 1)];
        }

        $CREATEVERIFYCODE = self::db()->prepare("UPDATE `".$GLOBALS['NIC_AUTH_DATABASE']."` set `mail_verify_code` = :mail_verify_code WHERE `id` = :userid");
        $CREATEVERIFYCODE->execute(array(":mail_verify_code" => $generatedCode, ":userid" => $userid));

        return $generatedCode;
    }

}
?>