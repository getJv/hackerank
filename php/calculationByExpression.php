/**
* Do the math based on given operator
* Returns a number
*/
function subTotal($num1,$operator,$num2){
  
  if($operator === '+'){
    return $num1 + $num2;
  }
  if($operator === '-'){
    return $num1 - $num2;
  }
  if($operator === '/'){
    return $num1 / $num2;
  }
  if($operator === '*'){
    return $num1 * $num2;
  }
  
}

/**
* Seach and solves all maths present at the list that uses the given operator
* Returns void
*/
function reduceMaths($operator,&$elements){
      while($indexTimes = array_search($operator,$elements)){
        $num2 = $elements[$indexTimes + 1];
        
        if(!is_numeric($num2) && $num2 === '-'  ){ // Signal changer
          array_splice($elements,$indexTimes + 1,1);
          $num2 = $elements[$indexTimes + 1] * -1;
        }
        
        $operator = $elements[$indexTimes];
        $num1 = $elements[$indexTimes - 1];
        array_splice($elements,$indexTimes + 1,1);
        array_splice($elements,$indexTimes,1);
        array_splice($elements,$indexTimes - 1,1,subTotal($num1,$operator,$num2));
        
        
      }
  }

/**
* Assemble the stack of operation and solves the parenteshis precedence
* Returns void
*/
function doCalculation($list,&$index){
  $result = 0;
  $parcialItems= [];
    
  for($index = $index; $index < count($list); $index++){
    $item = $list[$index];
    
    /* Validation rules*/
    $isTheFirstItem = function() use($parcialItems){
      return empty($parcialItems);
    };
    $isOperator = function($item){
        if(!is_numeric($item) && $item !== '(' && $item !== ')'){
          return true;
        }
        return false;
    };
    $belongsToDecimalNumber = function() use($item,$parcialItems){
      return is_numeric($item) && is_numeric(end($parcialItems));
    };
    $startsDecimalNumber = function() use($item,$parcialItems){
      return is_numeric($item) && end($parcialItems) === '.';
    };
    $isNegativeNumber = function() use($item,$parcialItems,$isOperator){
      return is_numeric($item) && end($parcialItems) === '-' && $isOperator($parcialItems[count($parcialItems)-1]);
    };
    $isJustAnumber = function() use($item){
      return is_numeric($item);
    };
    $shouldStartNewIteration = function() use($item){
      return $item === '(';
    };
    $shouldEndTheIteration = function() use($item){
      return $item === ')';
    };
    
    /* fork decision */  
    if( $shouldStartNewIteration() ){
      $subExpressioinResult = doCalculation($list,++$index);
      array_push($parcialItems,$subExpressioinResult);
      break;
    }
    else if( $shouldEndTheIteration() ){
      ++$index;
      break;
    }
    
    /* Decision Line */
    if($isTheFirstItem()){
      array_push($parcialItems,$item);
    }
    else if($isOperator($item)){
      array_push($parcialItems,$item);
    }
    else if( $belongsToDecimalNumber() ){ 
      $parcialItems[count($parcialItems) -1] = end($parcialItems) . $item;
    }
    else if( $startsDecimalNumber() ){ 
      array_pop($parcialItems);
      $parcialItems[count($parcialItems)-1] = end($parcialItems) . '.' . $item;
    }
    else if( $isNegativeNumber()  ){ 
      $parcialItems[count($parcialItems)-1] = end($parcialItems) . $item;
      
    }
    else if( $isJustAnumber ){
      array_push($parcialItems,$item);
    }
        
  }
  
  reduceMaths('*',$parcialItems);
  reduceMaths('/',$parcialItems);
  reduceMaths('-',$parcialItems);
  reduceMaths('+',$parcialItems);
  
  return (count($parcialItems) % 2 === 0)? array_sum($parcialItems) : end($parcialItems);
}

function calc ($expression) {
  var_dump($expression);
  $expressionItems = str_split(str_replace(" ","",$expression));
  $index = 0;
  return doCalculation($expressionItems,$index);
  
}
