<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

/*
* Usage: $curl->request->get("https://api.example.com");
* Usage: $curl->request->post("https://api.example.com", $data);
* Usage: $curl->request->put("https://api.example.com", $data);
* Usage: $curl->request->patch("https://api.example.com", $data);
* Usage: $curl->request->delete("https://api.example.com", $data);
* Usage: $curl->bearer->get("https://api.example.com", $token);
* Usage: $curl->bearer->post("https://api.example.com", $token, $data);
* Usage: $curl->bearer->put("https://api.example.com", $token, $data);
* Usage: $curl->bearer->patch("https://api.example.com", $token, $data);
* Usage: $curl->bearer->delete("https://api.example.com", $token, $data);
* Usage: $curl->functions->download("https://example.com/file.zip", "file.zip");
* Data is optional for POST, PUT, PATCH, DELETE
*/

$curl = new curl();

class curl
{

    /*
    * Constructor
    */
    public function __construct()
    {
        $this->request = new Request();
        $this->bearer = new Bearer();
        $this->functions = new Functions();
    }

}

class Request
{
    /*
    * Make a GET request to an endpoint
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
    * Make a POST request to an endpoint
    */
    public function post($url, $data = NULL)
    {

        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_POST, true);
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        if($data != NULL) {
            curl_setopt($opt, CURLOPT_POSTFIELDS, $data);
        }
        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;

    }

    /*
    * Make a PUT request to an endpoint
    */
    public function put($url, $data = NULL)
    {

        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        if($data != NULL) {
            curl_setopt($opt, CURLOPT_POSTFIELDS, $data);
        }

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;

    }

    /*
    * Make a PATCH request to an endpoint
    */
    public function patch($url, $data = NULL)
    {

        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        if($data != NULL) {
            curl_setopt($opt, CURLOPT_POSTFIELDS, $data);
        }
        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;

    }

    /*
    * Make a DELETE request to an endpoint
    */
    public function delete($url, $data = NULL)
    {

        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        if($data != NULL) {
            curl_setopt($opt, CURLOPT_POSTFIELDS, $data);
        }

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;

    }
}

class Bearer 
{
    /*
    * Make a GET Request with Bearer Token
    */
    public function get($url, $token)
    {
        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
           "Accept: application/json",
           "Authorization: Bearer {".$token."}",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;
    }

    /*
    * Make a POST Request with Bearer Token
    */
    public function post($url, $token, $data = NULL)
    {
        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_POST, true);
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer {".$token."}",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        if($data != NULL) {
            curl_setopt($opt, CURLOPT_POSTFIELDS, $data);
        }

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;
    }

    /*
    * Make a PUT Request with Bearer Token
    */
    public function put($url, $token, $data = NULL)
    {
        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer {".$token."}",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        if($data != NULL) {
            curl_setopt($opt, CURLOPT_POSTFIELDS, $data);
        }

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;
    }

    /*
    * Make a PATCH Request with Bearer Token
    */
    public function patch($url, $token, $data = NULL)
    {
        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer {".$token."}",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($opt, CURLOPT_POSTFIELDS, $data);

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;
    }

    /*
    * Make a DELETE Request with Bearer Token
    */
    public function delete($url, $token, $data = NULL)
    {
        $opt = curl_init($url);
        curl_setopt($opt, CURLOPT_URL, $url);
        curl_setopt($opt, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($opt, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer {".$token."}",
        );
        curl_setopt($opt, CURLOPT_HTTPHEADER, $headers);

        if($data != NULL) {
            curl_setopt($opt, CURLOPT_POSTFIELDS, $data);
        }

        $resp = curl_exec($opt);
        curl_close($opt);

        return $resp;
    }
}

class Functions
{
    /*
    * Download a file
    */
    public function download($url, $filename)
    {
        file_put_contents(BASE_PATH."storage/downloads/".$filename, fopen($url, 'r'));
        return true;
    }
}
