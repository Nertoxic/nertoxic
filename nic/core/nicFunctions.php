<?php

$nicFun = new nicFun();

class nicFun

{

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

}