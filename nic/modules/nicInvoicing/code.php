<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$inv = new inv();

class inv Extends mysql
{

    /*
    * createInvoice
    *
    * This function will create a invoice, you can either
    * add money with it or remove it.
    */
    public function createInvoice($amount, $minus, $reason, $username)
    {

        $useramount = $GLOBALS['userbalance'];
        $userid = $GLOBALS['userid'];

        if($minus == true) {
            $newAmount = $useramount - $amount;
        } else {
            $newAmount = $useramount + $amount;
        }

        $CHANGEAMOUNT = self::db()->prepare("UPDATE `users` SET `amount` = :newamount WHERE `username` = :username");
        $CHANGEAMOUNT->execute(array(":newamount" => $newAmount, ":username" => $username));

        $CREATEINVOICE = self::db()->prepare("INSERT INTO `invoices` SET `amount` = :amount, `reason` = :reason, `userid` = :userid");
        $CREATEINVOICE->execute(array(":amount" => $amount, ":reason" => $reason, ":userid" => $userid));


        if(!$CREATEINVOICE->rowCount() == NULL) {
            return true;
        } else {
            return false;
        }

    }

}
?>