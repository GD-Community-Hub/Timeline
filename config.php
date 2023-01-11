<?php
define('DB_SERVER', 'sql6.webzdarma.cz');
define('DB_USERNAME', 'gdtimelinewz4651');
define('DB_PASSWORD', '5n^89*NMK2UF-Aam#v24');
define('DB_NAME', 'gdtimelinewz4651');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>