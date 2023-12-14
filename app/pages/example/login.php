<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$currPage = 'auth_login';
require HANDLER_PATH.'nicPageHandler.php';
?>


<h1> Login Example Page </h1>
<br>
<small>
    <?php
    if(isset($_POST['login'])) {
        $auth->login($_POST['username'], $_POST['password']);
    }
    ?>
</small>

<br><br>

<form method="POST">
<?= $_POST['username']; ?>
<input name="username" placeholder="Username"></input> <br>
<input name="password" placeholder="Password"></input> <br>

<button name="login" type="submit">Login</button>
</form>