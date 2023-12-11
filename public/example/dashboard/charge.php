<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#
$nicPageType = "back"; # Use front for loading the frontend css/js and back to load the backend css/js
include '../../../nicLoader.php'; # Check if you used the correct loading folder

if(isset($_POST['chargeMoney'])) {
    $inv->startPayment($_POST['amount'], $_POST['provider'], $userid);
}
?>

<h1> Charge Money to your account </h1>
<br>
<br>

<form method="POST">
<input name="amount" type="number" placeholder="1.00"></input>
<br>

<label for="provider">Payment Provider</label>
<select name="provider" id="provider">

    <?php if($env['NIC_INV_MOLLIE_KEY'] !== NULL) { ?>
        <option value="mollie">Mollie</option>
    <?php } ?>

    <?php if($env['NIC_INV_MOLLIE_KEY'] !== NULL) { ?>
        <option value="paypal">PayPal</option>
    <?php } ?>


</select>
<br>

<button name="chargeMoney" type="submit">Charge money</button>
<br>

</form>