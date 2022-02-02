<?php
if(!function_exists('toTsubo')){
    function toTsubo($value){
        $result = round($value / 3.30579 );
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
    function toMan($value){
        $result = round($value / 10000);
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
    function manPerTsubo($yen, $meter){
        $result = round(toMan($yen) / toTsubo($meter));
        return $result;
    }
}
