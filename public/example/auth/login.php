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
?>


<h1> Login Example Page </h1>
<br>
<small>
    <?php
    if(isset($_POST['login'])) {
        $auth->login($_POST['username'], $_POST['password']);
    }
    ?>
</s,aöö>

<br><br>

<form method="POST">
<input name="username" placeholder="Username"></input> <br>
<input name="password" placeholder="Password"></input> <br>

<button name="login">Login</button>
</form>