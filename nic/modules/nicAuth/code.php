<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

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
        $MAILUSED = self::db()->prepare("SELECT * FROM `users` WHERE `usermail` = :usermail");
        $MAILUSED->execute(array(
            ":usermail" => $usermail
        ));

        if(!$MAILUSED->rowCount() == NULL) {
            $authSuccess = false;
            $authFeedback = "This E-Mail is already in use!";
        }

        // Check if auth was success
        if($authSuccess == true) {

            $password_en = password_hash($password, PASSWORD_DEFAULT);

            $CREATE_USER = self::db()->prepare("INSERT INTO `users` SET `username` = :username, `usermail` = :usermail, `password` = :password");
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
        $LOGINUSER = self::db()->prepare("SELECT * FROM `users` WHERE `username` = :username");
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

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $sessiontoken = '';
            for ($i = 0; $i < 10; $i++) {
                $sessiontoken = $characters[rand(0, strlen($characters))];
            }

            $INSERTSESS = self::db()->prepare("UPDATE `users` SET `session` = :sesstoken WHERE `username` = :username");
            $INSERTSESS->execute(array(":sesstoken" => $sessiontoken, ":username" => $username));

            setcookie('SESS', $sessiontoken, time()+'864000', '/');
            header("Location:".$GLOBALS['NIC_BASE_URL'].$GLOBALS['NIC_AUTH_REDERICT_LOGIN']);
        }

        // Return true / false
        return $authSuccess;

    }

}
?>