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
    * Make a body post curl to an endpoint
    */
    public function post($url, $data)
    {

        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_POST, true);
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($opt, CURLOPT_POSTFIELDS, $data);

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;

    }
    
    /*
    * Make a bearer auth to a webpage
    */
    public function bearer($url, $token)
    {

        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
           "Accept: application/json",
           "Authorization: Bearer {".$token."}",
        );

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;

    }

    /*
    * Download a external file
    */
    public function download($url, $filename)
    {
        
        file_put_contents(BASE_PATH."storage/downloads/".$filename, fopen($url, 'r'));

    }

}