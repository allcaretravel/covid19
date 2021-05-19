<?php  
use Carbon\Carbon;

if(!function_exists('DateTimeFormat')){
    function DateTimeFormat($date)
    {
        if($date){
            return Carbon::parse($date)->format('Y-m-d');
        }
        return '';
    }
}