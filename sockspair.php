<?php
// http://hr.gs/eabbdd 
// Complete the sockMerchant function below.
// $ar = [10, 20, 20, 10, 10, 30, 50, 10, 20]
// $n  = 9
function sockMerchant($n, $ar) {
    $pairs = [];
    $result = 0;
    
    
    foreach($ar as $item){
        if(array_key_exists($item, $pairs)){
          $pairs[$item] =  $pairs[$item] + 1 ;
        }else{
           $pairs[$item] = 1;
        }
    }
    
    foreach($pairs as $key => $value){
        
        if($value % 2 == 0){
            $result += $value / 2;
        }else if($value > 1){
            $result += intval($value / 2);
        }
        
    }
    
    return $result;

}


