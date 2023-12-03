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

}