<?php

$nicSec = new nicSec();

class nicSec

{

    /*
     * Protect
     *
     * Protect a string against manipulation
     */
    public function protect($string)
    {
        $protection = htmlspecialchars(trim($string), ENT_HTML401); // ENT_QUOTES
        return $protection;
    }
    
    /*
     * XSS Fix
     *
     * Secure a string
     */
    public function xss($string){

        $string = $this->protect($string);

        $string = str_replace('<','', $string);
        $string = str_replace('>','', $string);
        $string = str_replace('´','', $string);
        $string = str_replace('[','(', $string);
        $string = str_replace(']',')', $string);
        $string = str_replace("'",'', $string);

        return $string;
    }

}