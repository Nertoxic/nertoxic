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

        $dbOutput = $testDB['lineContent'];
        echo($testDB['lineContent']); // This will output the current content of the line specified inside the '' tag

    }

    if($dbOutput == NULL) {
        $console->callError(true, 'public/test/database.php', 'The Database couldnt be loaded correctly. Notice: The Test page only works with the default .env credentials
        or if you got a -nicTesting- database with a -lineContent- and a -key- field, which got one field filled out.');
    } else {
        require OUT_PATH.'success_database.html';
    }
?>