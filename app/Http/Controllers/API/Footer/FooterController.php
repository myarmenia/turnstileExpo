<?php

namespace App\Http\Controllers\API\Footer;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SocialLinksResource;
use App\Models\ContactInfoLinks;
use Illuminate\Http\Request;

class FooterController extends BaseController
{
    public function social_links(){
        $social_link = ContactInfoLinks::all();

        return is_null($social_link) ? $this->sendError('error message') :
               $this->sendResponse( SocialLinksResource::collection($social_link), 'success');
    }
}
