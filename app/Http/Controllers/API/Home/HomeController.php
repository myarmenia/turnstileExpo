<?php

namespace App\Http\Controllers\API\Home;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CurrentEarthquakesResource;
use App\Http\Resources\HomeResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\PressReleaseResource;
use App\Http\Resources\SocialLinksResource;
use App\Models\ContactInfoLinks;
use App\Models\CurrentEarthquake;
use App\Models\Language;
use App\Models\News;
use App\Models\PressRelease;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __construct(Request $request)
    {
        $lng = 'en';

        if($request->lng){
            $lng = $request->lng;
        }

        $lng_id = Language::where('name', $lng)->first()->id;
        $request['lng_id'] = $lng_id;
    }

    public function index(){

        $press_releases = PressRelease::where('status', 'confirmed')->orderBy('id', 'desc')->get()->take(12);
        $current_earthquake = CurrentEarthquake::where('status', 'confirmed')->orderBy('id', 'desc')->get()->take(12);
        $news = News::where('status', 'confirmed')->orderBy('id', 'desc')->get()->take(12);
        $data = [
            'press_releases' => PressReleaseResource::collection($press_releases),
            'current_earthquake' => CurrentEarthquakesResource::collection($current_earthquake),
            'news' => NewsResource::collection($news),
            ];

        return is_null($data) ? $this->sendError('error message') :
               $this->sendResponse( $data, 'success');
    }
}
