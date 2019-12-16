<?php
class nth{
    public function check($angka){
        $urut = $angka; 
        $kumpul = "";
        for($x=1;$x<=$urut;$x++){
            $kumpul.=$x;
        }

        $arr = str_split($kumpul);
        return $arr[$urut-1];
    }

}