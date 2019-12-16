<?php

class coba{
    public function intcheck(int $urut){
        //$urut = $_GET['urut'];
        $array = range(1,$urut);
        $plode = (string)implode("", $array);
        return substr($plode,($urut-1),1);
    }
}