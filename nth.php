<?php

$urut = $_GET['urut'];
$kumpul = "";
for($x=1;$x<=$urut;$x++){
    $kumpul.=$x;
}

$arr = str_split($kumpul);
echo $arr[$urut-1]."<br>";
