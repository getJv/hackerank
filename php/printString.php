<?php

  //http://hr.gs/bedcab

function printString($string,$counter,$limit){
    $counter = $counter - 1;
    return $string . ( ($counter == 0 || strlen($string)== $limit) ? '': printString($string,$counter,$limit)  );
}
//abaabaabaabaabaabaabaabaabaaba
//abaabaabaabaabaabaabaabaabaaba
// Quantas letas a na entrada. (aba) => 2
// Vai se repetir 10/3 = 3,3 times.
// 2 vezes 3 = 6 letras 'a' na parte inteira
// a entrata tem strlen($s) = 3 letras. cada letra representa 33%, logo pegamos mais uma pra dar o tamanho. a 
// resultado é 6 + 1 = 7
// Teste 1
// gfcaaaecbg
// 547602
// Teste 2 (112436 112437)
// jdiacikk
// 899491
// Teste 3
// epsxyyflvrrrxzvnoenvpegvuonodjoxfwdmcvwctmekpsnamchznsoxaklzjgrqruyzavshfbmuhdwwmpbkwcuomqhiyvuztwvq (16481469408)
// 549382313570
// R: 16481469408
// Teste 4 
// 10R: ojowrdcpavatfacuunxycyrmpbkvaxyrsgquwehhurnicgicmrpmgegftjszgvsgqavcrvdtsxlkxjpqtlnkjuyraknwxmnthfpt
// 10R: 685118368975
// 10R: 41107102139
// 10R: 41107102134
// Complete the repeatedString function below.
function repeatedString($s, $n) {
    

    /*  
        # this solution throw runtimeException pr memory exception
        if(strlen($s) == 1 && $s == 'a' ){return $n;}
        $fullString = printString($s,$n,$n);
        $partialString = substr($fullString,0,$n);
        return preg_match_all('/a/i', $partialString, $matches); 
    */
    /*  #Result: 11/23 failed
        $initial_a_incidence = preg_match_all('/a/i', $s, $matches);
        echo "\n initial_a_incidence: $initial_a_incidence";
        if($initial_a_incidence == 0){return 0;}
        $repetition_rate = round($n / strlen($s));
        echo "\n repetition_rate: $repetition_rate";
        $int_part = floor( $repetition_rate ) ;  
        echo "\n int_part: $int_part";
        $fraction_part = $repetition_rate - $int_part;
        echo "\n fraction_part: $fraction_part";
        $fraction_part = $fraction_part < 1 ? $fraction_part * 10 : $fraction_part * 100;
        echo "\n fraction_part: $fraction_part";
        $incidence_at_integer_part = $initial_a_incidence * $int_part;
        echo "\n incidence_at_integer_part: $incidence_at_integer_part";
        $residual_letters = (($fraction_part * 100/strlen($s))/100);
        echo "\n residual_letters: $residual_letters";
        $partial_hash_string = substr($s, 0,$residual_letters);
        echo "\n partial_hash_string: $partial_hash_string";
        $partial_incidence  = preg_match_all('/a/i', $partial_hash_string, $matches);
        echo "\n partial_incidence: $partial_incidence";
        $result = $incidence_at_integer_part + $partial_incidence;
        echo "\n incidence_at_integer_part: $incidence_at_integer_part";
        echo "\n result: $result";
        return $result;
    */
    
    /* Community solution 12/27 fails
        if (!preg_match_all('/a/i', $s, $matches)) {
            return 0;
        }

        $numberOfStrings = $n / strlen($s);
        echo "\n numberOfStrings: $numberOfStrings";
        $subString       = $n  % strlen($s);
        echo "\n subString: $subString";
        $numberOfA       = 0;

        for($i = 0; $i < strlen($s); $i++) {
            if($s[$i] == 'a') {
                if($i < $subString) {
                    $numberOfA += $numberOfStrings + 1;
                } else {
                    $numberOfA += $numberOfStrings;
                }
            }
        }
        
        return floor($numberOfA);
    */
    
    /* Community solution 100% */
    // Take out the excess part of s inside n
    $rest = $n % strlen($s);
    // Number of occurrence of the string s
    $occurrenceNumber = ($n - $rest) / strlen($s);
    $numbersOfA = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] === 'a') {
            $numbersOfA += $occurrenceNumber;
            if ($i < $rest) {
                $numbersOfA++;
            }
        }
    }
    return $numbersOfA;
    
    
}



