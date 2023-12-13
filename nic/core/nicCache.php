<?php

$cache = new cache();

class cache

{


    public function write($path, $data)
    {
        $filePath = CACHE_PATH.$path.'/data.php';

        $file = fopen($filePath, "a+");
        fwrite($file, $data);
        fclose($file);

    }

    public function delete($path)
    {
        $filePath = CACHE_PATH.$path.'/data.php';

        //$file = fopen($filePath, "a+");
        unlink($file);

    }

}