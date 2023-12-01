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

<?= $httpDocument = $_SERVER["DOCUMENT_ROOT"]; ?>
<?= $httpAddr = $_SERVER['SERVER_ADDR']; ?>
<?= $httpPort = $_SERVER["SERVER_PORT"]; ?>
<?= $httpScheme = $_SERVER["REQUEST_SCHEME"]; ?>
<?= $httpDomain = $_SERVER['HTTP_HOST']; ?>
<?= $httpUri = $_SERVER["REQUEST_URI"]; ?>
<?= $httpQuery = $_SERVER['QUERY_STRING']; ?>
<?= $httpSelf = $_SERVER['PHP_SELF']; ?>