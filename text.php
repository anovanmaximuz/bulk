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

        $this->generateMap($unik, $hitung, $arraym, $string);       
    }   
    
    private function generateMap($unik, $hitung, $arraym, $string){
        if($this->checkLong($string)){
        
        $before = $this->getBefore($hitung, $arraym);
        $after = $this->getAfter($hitung, $arraym);
        $mapping = array();
        foreach($unik as $list){
            $mapping[] = $list.":".$hitung[$list].":before:".((isset($before[$list])) ? implode(",", $before[$list]): "none").":after:".((isset($after[$list])) ? implode(",", $after[$list]):"none");
        }
        echo json_encode($mapping);
        //print_r($before);
       // print_r($after);
        }else{
            die("(not longer then 255 chars");
        }

    }

        //check for only one from multi
    private function getBefore($hitung, $arraym){
         $hexa = array();
        foreach($hitung as $key => $val){            
                foreach($arraym as $pos => $isi){
                    if($isi == $key){
                        if(isset($arraym[$pos+1]) && strlen($arraym[$pos+1])>0 && $arraym[$pos+1] !=" " ){
                            $hexa[$key][] = $arraym[$pos+1];
                        }
                    }
                } 
        }
        
        return $hexa;
        
    }
    
    private function getAfter($hitung, $arraym){
         $hexa = array();
        foreach($hitung as $key => $val){            
                foreach($arraym as $pos => $isi){
                    if($isi == $key){
                        if(isset($arraym[$pos-1]) && strlen($arraym[$pos-1])>0 && $arraym[$pos-1] !=" " ){
                            $hexa[$key][] = $arraym[$pos-1];
                        }
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