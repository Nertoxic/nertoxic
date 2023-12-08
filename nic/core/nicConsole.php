<?php

$console = new console();

class console

{

    /*
     * callError
     */
    public function callError($critical, $file, $desc)
    {

        if($critical == true) {

            echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('File: ".$file."');</script>";
            echo "<script>console.log('Ciritcal: ".$critical."');</script>";
            echo "<script>console.error('Error: ".$desc."');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
        
            include OUT_PATH.'error.html';
            die();

        } else {

            echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('File: ".$file."');</script>";
            echo "<script>console.log('Ciritcal: ".$critical."');</script>";
            echo "<script>console.error('Error: ".$desc."');</script>";
            echo "<script>console.log('');</script>";
            echo "<script>console.log('--------------------- [NERTOXIC] ---------------------');</script>";

        }

    }

}