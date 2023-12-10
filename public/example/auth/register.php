<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#
$nicPageType = "front"; # Use front for loading the frontend css/js and back to load the backend css/js
include '../../../nicLoader.php'; # Check if you used the correct loading folder

if(isset($_POST['register'])) {
    $auth->register($_POST['username'], $_POST['usermail'], $_POST['password'], $_POST['password_repeat']);
}
?>


<h1> Register Example Page </h1>
<br>
<small>Register successfull: <?= $authSuccess; ?></small>

<br><br>

<form method="POST">
<input name="username" placeholder="Username"></input> <br>
<input name="usermail" placeholder="E-Mail"></input> <br>
<input name="password" placeholder="Password"></input> <br>
<input name="password_repeat" placeholder="Password repeat"></input> <br>

<button name="register">Create Account</button>
</form>