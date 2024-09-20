<?php
$file = $_GET['file'];
if(strpos($file, '....//') !== false) {
    $file = str_replace("....//","",$file);
}
if (strpos($file, '../') !== false) {
    $file = str_replace("../","",$file);
}

include "/var/www/html/$file";


