<?php
function writeLog($value)
{
    $fp = fopen('log.txt', 'a');
    fwrite($fp, "$value\n");
    fclose($fp);
}

?>