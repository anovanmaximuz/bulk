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
        
        $arraym = array();
        $x=0;
        foreach($random as $list){
            $arraym[$x] = $list;
            $x++;
        }
        
        echo '<pre>';
        print_r($arraym);
        
        echo '<br>-----------<br>';
        //BEFORE
        $before = $this->getBefore($hitung, $arraym);
        print_r($before);
        
        echo '<br>-----------<br>';
        $char = array();
        print_r($hitung);   
        echo '<br>';
        $sebelum= $this->getBefore("o", $random);
        echo $sebelum;
        
        //echo $arraym[2];
    }    
    
    //check for only one from multi
    public function getBefore($hitung, $arraym){
         $hexa = array();
        foreach($hitung as $key => $val){            
                foreach($arraym as $pos => $isi){
                    if($isi == $key){
                        $hexa[$key][] = $arraym[$pos+1];
                    }
                }               
            
        }
        
        return $hexa;
        
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