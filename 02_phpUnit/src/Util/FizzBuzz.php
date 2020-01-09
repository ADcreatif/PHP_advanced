<?php


namespace App\Util;


class FizzBuzz
{

    public function generate($numberMin, $numberMax) {
        $output = '';
        do{
            $output .= $this->checkNumber($numberMin);
            $numberMin++;
        } while( $numberMin <= $numberMax );

        return $output;
    }

    private function checkNumber($number){
        if($number % 15 == 0)
            return 'FizzBuzz';
        if($number % 5 == 0)
            return 'Buzz';
        if($number % 3 == 0)
            return 'Fizz';

        return $number;
    }
}