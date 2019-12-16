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
        $char = array();
        foreach ($random as $huruf){
            
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