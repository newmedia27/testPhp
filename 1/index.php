<?php

include __DIR__ ."/TextWork.php";

$file=__DIR__ . '/datalist.txt';
$work = new TextWork($file);
echo '<pre>';
var_export($work->getResult());