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
        
        echo '<pre>ddd';
        //print_r($arraym);
        
         echo '<br>-----------<br>';
        $char = array();
        print_r($hitung);   
        echo '<br>';

        
        //echo $arraym[2];
        echo '<br>-----------<br>';
        //BEFORE
        
        $this->generateMap($unik, $hitung, $arraym);
       
    }   
    
    private function generateMap($unik, $hitung, $arraym){
        $before = $this->getBefore($hitung, $arraym);
        $after = $this->getAfter($hitung, $arraym);
        $mapping = array();
        foreach($unik as $list){
            $mapping[] = $list.":".$hitung[$list].":before:".implode(",", $before[$list]).":after:".implode(",", $after[$list]);
        }
        
        
        echo json_encode($mapping);
        //print_r($before);
       // print_r($after);

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