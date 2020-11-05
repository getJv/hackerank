<?php
//http://hr.gs/efaabf 
// Complete the jumpingOnClouds function below.
//0 0 1 0 0 1 0 or 0 0 0 1 0 0
// expected: 28, entry: 00100001000010000010100010010001010000000010010100
// 0010000100
// is equal to the number of the current cloud plus  1 or 2 .
function jumpingOnClouds($c) {
    $path = [];
    $limit = count($c)-1 ;
    
    for($i = 0; $i < $limit; $i++){
       
        //Neutrals
         if($i == 0){$path[] = $i; continue;}
        if($i == $limit-1 && $c[$i] == 0 ){$path[] = $i; continue;}
        if($i == $limit-1 && $c[$i] == 1 ){ continue;}
        //Rule
        $n1   = $c[$i];   // 0
        $n2   = $c[$i+1];  // 1
        if($n2 == 0){
          $i += 1;
          $path[] = $i;     
        }else if($n1 == 0){
          $path[] = $i;     
        }
  
    }
  
    return count($path);

}

/*

Solução Bronze
$path = [];
    $limit = count($c)-1 ;
    
    for($i = 0; $i < $limit; $i++){
       
       if($c[$i] == 1) {continue;} 
        if($i == 0){$path[] = $i; continue;}
        if($i == $limit-1){$path[] = $i; continue;}
        if($c[$i-1] == 1){$path[] = $i; continue;}
        if($c[$i+1] == 0){continue;}
      
           $path[] = $i;
      
       
              
    }
    
         
  
    echo (implode($path,","));
    
   
    
    return count($path);


*/

