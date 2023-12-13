<?php

$cache = new cache();

class cache

{


    public function write($path, $data)
    {
        $file = CACHE_PATH.'data.php';

        fopen($file, "a+");
        fwrite($file, $data);
        fclose($file);

    }

}