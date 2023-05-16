<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends BaseController
{
    public function index(){

        $laguages = Language::all();

        return json_decode($laguages);
    }
}
