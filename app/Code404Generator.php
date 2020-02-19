<?php 

namespace App;

class Code404Generator {
    public static function generate() {
        $code = "";
        $tt = 0;
        for ($i=0; $i < 10; $i++) {
            $rand = rand(65,90);
            $tt += $rand;
            $letter = chr($rand);
            $code .= $letter;
        }

        $tt = $tt % 404;
        if ($tt<10)  $tt = '0'. $tt;
        if ($tt<100) $tt = '0' . $tt;
        return $code . $tt;
    }

    public static function decode($code) {
        if(strlen($code) != 13) return false;

        $modulo = substr($code, -3, 3);
        $base   = substr($code, 0, 10);

        $tt = 0;
        for ($i=0; $i < 10; $i++) { 
            $tt += ord($base[$i]);
        }
        return $tt%404 == $modulo;
    }
}