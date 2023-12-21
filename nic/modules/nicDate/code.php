<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$date = new date();

class date
{
    
    /*
    * Get a field value by userid
    */
    public function generate($values)
    {
        // Default: Y-m-d H:i:s

        $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
        $datetime = $date->format(''.$values.'');

        return $datetime;

    }

}
?>