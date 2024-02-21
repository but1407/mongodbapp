<?php

function isUppercase($value, $message, $fail){
    if($value !== mb_strtoupper($value,'UTF-8')){
        //have error
        $fail($message);

    }
}
?>
