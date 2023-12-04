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
        return $licenseKey;
    }

    public function checkLicense()
    {
        $licenseKey = $GLOBALS['NIC_LICENSE'];
        return true;
    }

}