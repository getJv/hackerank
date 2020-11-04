/* http://hr.gs/3rtx 
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path (sample:  UDDDUDUU)
 */

function countingValleys($steps, $path) {
    $valeyCount = 0;
    $depth = 0;
    $pathFragments = str_split($path);
    
    foreach($pathFragments as $direction){
        echo $direction;
        if($direction == 'D'){
            $depth += -1;
            if($depth == -1){
               $valeyCount += 1; 
            }
        }else if($direction == 'U'){
            $depth += 1;
        }
    }
    return $valeyCount;
}
