<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$curl = new curl();

class curl
{

    /*
    * Create a simple get Curl request
    */
    public function get($url)
    {

        $opt = curl_init($url);

        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($opt);
        curl_close($opt);

        // var_dump($resp);
        return $resp;

    }

    /*
    * Download a external file
    */
    public function download($url)
    {

        file_put_contents("test.zip", fopen($url, 'r'));

    }

}