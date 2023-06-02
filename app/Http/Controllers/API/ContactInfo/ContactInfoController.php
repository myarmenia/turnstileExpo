<?php

namespace App\Http\Controllers\API\ContactInfo;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactInfoResource;
use App\Models\ContactInfo;
use App\Models\Language;
use Illuminate\Http\Request;

class ContactInfoController extends BaseController
{

    public function __construct(Request $request)
    {
        $lng = 'en';

        if ($request->lng) {
            $lng = $request->lng;
        }

        $lng_id = Language::where('name', $lng)->first()->id;
        $request['lng_id'] = $lng_id;
    }

    public function index(Request $request)
    {
        $contact_info = ContactInfo::first();

        return is_null($contact_info) ? $this->sendError('error message') :
            $this->sendResponse(new ContactInfoResource($contact_info), 'success');
    }
}
