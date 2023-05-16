<?php

use App\Models\Language;

if(!function_exists('languages')){
    function languages(){
        return Language::all();
    }
}
