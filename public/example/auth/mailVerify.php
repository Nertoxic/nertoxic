<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#
$nicPageType = "mailverify"; # Use front for loading the frontend css/js and back to load the backend css/js
include '../../../nicLoader.php'; # Check if you used the correct loading folder

$verifyCode = $base->randomeString(12, false);
echo($verifyCode);
$mailer->sendMail($usermail, 'Mail Verification Code', 'Your verification code is: '.$verifyCode);

if(isset($_POST['checkCode'])) {

    echo("<br>".$_POST['mailCode']);

    $checkCode = $base->verifyString($verifyCoe, $_POST['mailCode']);

    if($checkCode == true) {
        $auth->verifyMail($usermail);
    } else {
        $console->callError(false, 'mailVerify.php', 'The Mail Verification Code u entered wasnt right.');
    }

}
?>


<h1> Mail Verification needed </h1>
<br>
<small>We've sended a code to your E-Mail, please enter this code here.</small>
<br><br>

<form method="POST">
<input name="mailCode" placeholder="E-Mail Code"></input>
<br>
<button name="checkCode" type="Submit"> Check Code </button>
</form>