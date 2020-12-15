<?php
class ConvertAnyBaseToBinary
{

    function __construct($argv)
    {
        $number = $argv[1];
        $base = $argv[2];
        echo $this->convert($number, $base);
    }

    public function convert($decimal_number, $base)
    {

        $remStack = [];
        $digits = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $number = $decimal_number;
        $rem = 0;
        $base_string = "";

        if (!($base >= 2 && $base <= 36)) {
            return;
        }

        while ($number > 0) {
            $rem = floor($number % $base);

            array_push($remStack, $rem);

            $number = floor($number / $base);
        }

        while (count($remStack) > 0) {
            $base_string .= $digits[array_pop($remStack)];
        }

        return $base_string;
    }
}

new ConvertAnyBaseToBinary($argv);
