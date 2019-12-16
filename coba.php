<?php

$urut = $_GET['urut'];
$array = range(1,$urut);
$plode = (string)implode("", $array);
echo substr($plode,($urut-1),1);