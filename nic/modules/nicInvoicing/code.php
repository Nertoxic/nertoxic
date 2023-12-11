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

    
    /*
    * startPayment
    *
    * This function will start a payment session
    */
    public function startPayment($amount, $provider, $userid)
    {

        if($provider == "mollie") {

            // Authorise to the api
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey($NIC_INV_MOLLIE_KEY);

            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => $amount
                ],
                "description" => "Charge Budget",
                "redirectUrl" => $BASE_URL.$NIC_INV_PAYMENT_SUCCESS_PAGE,
                //"webhookUrl"  => "https://webshop.example.org/mollie-webhook/",
            ]);

        }

        return false;
    }

}
?>