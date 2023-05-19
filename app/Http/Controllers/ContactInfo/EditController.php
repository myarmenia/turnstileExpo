<?php

namespace App\Http\Controllers\ContactInfo;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit()
    {
        $contact_info = ContactInfo::first();

        dd($contact_info);
    }
}
