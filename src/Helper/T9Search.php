<?php

namespace App\Helper;

class T9Search {
    static array $t9_map = [
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v'],
        '9' => ['w', 'x', 'y', 'z']
    ];

    public static function generateT9Sequence($string): int {
        $string = strtolower($string);
        $sequence = '';

        if(is_numeric($string)){
            return $string;
        }

        foreach(str_split($string) as $char) {
            foreach(T9Search::$t9_map as $digit => $letters) {
                if (in_array($char, $letters)) {
                    $sequence .= $digit;
                    break;
                }
            }
        }

        return $sequence;
    }
}