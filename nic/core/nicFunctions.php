<?php

$base = new base();

class base

{

    /*
    * update
    *
    * This will install the latest nertoxic version
    */
    public function update()
    {
        $url = "https://nertoxic.com/api/test.zip";
        $filename = "nertoxic.zip";

        file_put_contents(BASE_PATH.$filename, fopen($url, 'r'));

        $zip = new ZipArchive;
        $zip->open(BASE_PATH.$filename);
        $zip->extractTo(BASE_PATH);
        $zip->close();
    }

    /*
     * getBaseURL
     *
     * Return the Base URL of the System
     */
    public function getBaseURL()
    {
        $baseURL = $GLOBALS['NIC_BASE_URL'];
        return $baseURL;
    }

    /*
     * getLicense
     *
     * Return the License of the Nic Framework, can be 
     * used for paid modules or paid code
     */
    public function getLicense()
    {
        $licenseKey = $GLOBALS['NIC_LICENSE'];
        //return $licenseKey; // Disabled for Security reasons, could be used to grab license keys
    }
    
    /*
     * checkLicense
     *
     * This function will either return true = valid or
     * false = not valid
     */
    public function checkLicense()
    {
        $licenseKey = $GLOBALS['NIC_LICENSE'];
        return true;
    }
    
    /*
     * randomeString
     *
     * This function will generate a randome String, with
     * the option to set the length of the randome string
     */
    public function randomeString($length, $special)
    {
        // If special chars allowed
        if($special == true) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!"§$%&/()=?*+#´`';
        } else {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        // Set the Char length
        $charactersLength = strlen($characters);
        $randomString = '';

        // Generate the string
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /*
     * spaceToBr
     *
     * This function will make any empty line (within
     * the given string) into a html <br>
     */
    public function spaceToBr($string)
    {
        //$string = $nicSec->xss($string); // This will call the security function to save the string for xss attacks
        $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
        return $string;
    }

    /*
     * formatDateTo_dmy_hi
     *
     * Format a date inside the given string into
     * d.m.y H:i
     */
    public function formatDateDefault($date)
    {
        $date = new DateTime($date, new DateTimeZone('Europe/Berlin'));
        return $date->format('d.m.Y H:i');
    }
    
    /*
     * verifyString
     *
     * Verify to values which each others
     */
    public function verifyString($val1, $val2)
    {
        if($val1 == $val2) {
            return true;
        } else {
            return false;
        }
    }

}