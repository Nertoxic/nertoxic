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
     */
    public function register($userName, $password, $passwordRepeat)
    {

        // Check if password is doubled
        if(!$password == $passwordRepeat) {
            $authSuccess = false;
            $authFeedback = "The Passwords are not matching";
        }

        

        // Return auth code
        return $authSuccess;

    }

}
?>