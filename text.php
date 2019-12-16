<?php

class text{
    public function checkLong(string $string){
        if(strlen($string)>255){
            return false;
        }else{
            return true;
        }
    }
    
    public function nowCheck(string $string){
        //football vs soccer
        $random = str_split($string);
        $unik = array_unique($random);
        $hitung = array_count_values($random);
        $char = array();
        print_r($hitung);   
        echo '<br>';
        echo $this->getBefore("f", $random);
    }
    
    
    //check for only one
    public function getBefore(string $char, array $stringRandom){
        //test for f only if one
        $pos = array_search($char, $stringRandom); 
        if($pos==0){
            return $stringRandom[1];
        }else{
            return $stringRandom[1];
        }
        
    }
    
}

$eko = new text();
echo $eko->nowCheck("football vs soccer");


//notes

//football vs soccer

//result 
//f : 1 : before: o after: none
//o : 3 : before: o,t,c after: o,f,s max-distance: 10 chars 
//t : 1 : before: b, after: o