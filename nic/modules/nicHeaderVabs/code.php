<?php
/*
// ======= PARSE_URL ====== //
$x = parse_url($url);
$x['scheme']       🡺 https
$x['host']         🡺         example.com
$x['path']         🡺                    /subFolder/myfile.php
$x['query']        🡺                                          var=blabla
$x['fragment']     🡺                                                     555

//=================================================== //
//========== self-defined SERVER variables ========== //
//=================================================== //
$_SERVER["DOCUMENT_ROOT"]  🡺 /home/user/public_html
$_SERVER["SERVER_ADDR"]    🡺 143.34.112.23
$_SERVER["SERVER_PORT"]    🡺 80(or 443 etc..)
$_SERVER["REQUEST_SCHEME"] 🡺 https                                         //similar: $_SERVER["SERVER_PROTOCOL"] 
$_SERVER['HTTP_HOST']      🡺         example.com (or with WWW)             //similar: $_SERVER["SERVER_NAME"]
$_SERVER["REQUEST_URI"]    🡺                       /subFolder/myfile.php?var=blabla
$_SERVER["QUERY_STRING"]   🡺                                             var=blabla
__FILE__                   🡺 /home/user/public_html/subFolder/myfile.php
__DIR__                    🡺 /home/user/public_html/subFolder              //same: dirname(__FILE__)
$_SERVER["REQUEST_URI"]    🡺                       /subFolder/myfile.php?var=blabla
parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)🡺  /subFolder/myfile.php 
$_SERVER["PHP_SELF"]       🡺                       /subFolder/myfile.php
*/

$httpScheme = $x['scheme'];
?>