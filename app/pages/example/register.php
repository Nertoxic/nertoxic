<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$currPage = 'auth_register';
?>

<h1> Register Example Page </h1>
<br>
<small>
    <?php
    if(isset($_POST['register'])) {
        $auth->register($_POST['username'], $_POST['usermail'], $_POST['password'], $_POST['password_repeat']);
    }
    ?>
</s,aöö>

<br><br>

<form method="POST">
<input name="username" placeholder="Username"></input> <br>
<input name="usermail" placeholder="E-Mail"></input> <br>
<input name="password" placeholder="Password"></input> <br>
<input name="password_repeat" placeholder="Password repeat"></input> <br>

<button name="register">Create Account</button>
</form>