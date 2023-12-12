<?php

$catch = new catch();

class catch

{


    public function write($path, $data)
    {
        $file = CACHE.$path."data.php";

        fopen($file, "w");
        fwrite($file, $data);
        fclose($file);

    }

}