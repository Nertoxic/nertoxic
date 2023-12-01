<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#
$nicPageType = "x";
include '../../nicLoader.php';
?>

<?= $httpDocument = $_SERVER["DOCUMENT_ROOT"]; ?> <br>
<?= $httpAddr = $_SERVER['SERVER_ADDR']; ?> <br>
<?= $httpPort = $_SERVER["SERVER_PORT"]; ?> <br>
<?= $httpScheme = $_SERVER["REQUEST_SCHEME"]; ?> <br>
<?= $httpDomain = $_SERVER['HTTP_HOST']; ?> <br>
<?= $httpUri = $_SERVER["REQUEST_URI"]; ?> <br>
<?= $httpQuery = $_SERVER['QUERY_STRING']; ?> <br>
<?= $httpSelf = $_SERVER['PHP_SELF']; ?> <br>