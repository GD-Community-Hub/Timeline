<?php
define('DB_SERVER', 'llmp.spse-net.cz ');
define('DB_USERNAME', 'borovesi22');
define('DB_PASSWORD', 'Qwasyx123');
define('DB_NAME', 'borovesi22_1');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>