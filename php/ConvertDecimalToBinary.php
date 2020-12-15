<?php
class ConvertDecimalToBinary
{

    function __construct($argv)
    {
        $number = $argv[1];
        echo $this->convert($number);
    }

    public function convert($decimal_number)
    {
        $remStack = [];
        $number = $decimal_number;
        $rem = 0;
        $binary_string = "";

        while ($number > 0) {
            $rem = floor($number % 2);

            array_push($remStack, $rem);

            $number = floor($number / 2);
        }

        while (count($remStack) > 0) {
            $binary_string .= array_pop($remStack);
        }

        return $binary_string;
    }
}

new ConvertDecimalToBinary($argv);
