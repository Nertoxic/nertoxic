<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#
$nicPageType = "database_test";
include '../../nicLoader.php';
?>

<?php
    $DB_TEST = $mysql->db()->prepare("SELECT * FROM `nicTesting`");
    $DB_TEST->execute();
    while ($testDB = $DB_TEST -> fetch(PDO::FETCH_ASSOC)){

        $testDB['lineContent']; // This will output the current content of the line specified inside the '' tag

    }
?>