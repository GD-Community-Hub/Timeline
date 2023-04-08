<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u859664993_EsmiK');
define('DB_PASSWORD', 'Qwasyx123');
define('DB_NAME', 'u859664993_gdhub');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>