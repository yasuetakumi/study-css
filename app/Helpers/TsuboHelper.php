<?php
if(!function_exists('toTsubo')){
    function toTsubo($value, $sign = false){
        $result = round($value / 3.30579 );
        if($sign){
            $result = $result . '坪';
        }
        return $result;
    }
}

if(!function_exists('fromTsubo')){
    function fromTsubo($value){
        $result = round($value * 3.30579);
        return $result;
    }
}

if(!function_exists('toMan')){
    function toMan($value, $sign = false){
        $result = round($value / 10000);
        if($sign){
            $result = $result . '万円';
        }
        return $result;
    }
}

if(!function_exists('fromMan')){
    function fromMan($value){
        $result = round($value * 10000);
        return $result;
    }
}

if(!function_exists('manPerTsubo')){
    function manPerTsubo($yen, $meter, $sign = false){
        $result = round(toMan($yen) / toTsubo($meter));
        if($sign){
            $result = '坪単価：'. $result . '万円';
        }
        return $result;
    }
}
