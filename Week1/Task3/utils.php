<?php
function congHaiSo($a,$b){
    return $a+$b;
}

function truHaiSo($a,$b){
    return $a-$b;
}

function nhanHaiSo($a,$b){
    return $a*$b;
}

function chiaHaiSo($a,$b){
    return $a/$b;
}



function laSoNT($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false; 
        }
    }
    return true;
}

function laSoChan($a){
    if($a%2!=0){
        return false;
    }
    return true;

}


?>