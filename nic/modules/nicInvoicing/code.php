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
    public function createInvoice($amount, $minus, $reason, $userid)
    {

        if($minus == true) {
            $newAmount = $useramount - $amount;
        } else {
            $newAmount = $useramount + $amount;
        }

        $CHANGEAMOUNT = self::db()->prepare("UPDATE `users` SET `amount` = :newamount WHERE `id` = :userid");
        $CHANGEAMOUNT->execute(array(":newamount" => $newAmount, ":userid" => $userid));

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

        $paymentSuccess = true;

        if(empty($amount)) {
            $paymentSuccess = false;
            $paymentFeedback = "You need to enter a valid amount";
        }

        if(empty($provider)) {
            $paymentSuccess = false;
            $paymentFeedback = "You need to enter a valid payment provider";
        }

        if(empty($userid)) {
            $paymentSuccess = false;
            $paymentFeedback = "The userid couldnt be found, please re-login";
        }

        if($paymentSuccess == true) {
            if($provider == "mollie") {

                // Authorise to the api
                $mollie = new \Mollie\Api\MollieApiClient();
                $mollie->setApiKey($GLOBALS['NIC_INV_MOLLIE_KEY']);
    
                // Create payment
                $payment = $mollie->payments->create([
                    "amount" => [
                        "currency" => "EUR",
                        "value" => $amount
                    ],
                    "description" => "Charge Budget",
                    "redirectUrl" => $BASE_URL.$NIC_INV_PAYMENT_SUCCESS_PAGE."?amount=".$amount,
                ]);

                // Check if payment was successfull
                if($payment == true) {
                    self::createInvoice($amount, false, 'Charged via Mollie', $GLOBALS['userid']);
                } else {
                    $paymentSuccess = false;
                }
    
            }

            if($provider == "paypal") {

                // Enter paypal api

            }
        }

        echo($paymentFeedback);
        return $paymentSuccess;
    }

}
?>