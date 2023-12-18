<?php

$cache = new cache();

class cache
{

    /*
    * cache Write
    *
    * Write something inside the cache
    */
    public function write($path, $data)
    {
        $filePath = CACHE_PATH.$path.'/data.php';

        $file = fopen($filePath, "a+");
        fwrite($file, $data);
        fclose($file);

    }

    /*
    * cache Delete
    *
    * Delete something inside the cache
    */
    public function delete($path)
    {
        $filePath = CACHE_PATH.$path.'/data.php';

        //$file = fopen($filePath, "a+");
        unlink($filePath);

    }

}