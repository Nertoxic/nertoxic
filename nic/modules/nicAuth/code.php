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

        // Check if password is doubled
        if($password !== $passwordRepeat) {
            $authSuccess = false;
            $authFeedback = "The Passwords are not matching";
        }

        // Check if Register is allowed
        if($GLOBALS['NIC_AUTH_REGISTER'] == "false") {
            $authSuccess = false;
            $authFeedback = "Registration has been disabled.";
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

        // Return auth code
        return $authFeedback;

    }

}
?>