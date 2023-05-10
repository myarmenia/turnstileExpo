<?php

use App\Models\Language as ModelsLanguage;

if(!function_exists('languages')){
    function languages(){
        return ModelsLanguage::all();
    }
}
