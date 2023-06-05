<?php

namespace App\Http\Controllers\API\SmartSearch;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SmartSearchResource;
use App\Models\CurrentEarthquakesTranslations;
use App\Models\Language;
use App\Models\MapRegionInfoTranslation;
use App\Models\NewsTranslation;
use App\Models\PressReleaseTranslation;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SmartSearchController extends BaseController
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

    public function index(Request $request) {
        $data = [];
        $search = $request->search;

        $current_earthquakes = CurrentEarthquakesTranslations::orderBy('id', 'DESC')->where('language_id', $request->lng_id)->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get()->toArray();

        // dd($current_earthquakes);


        $press_release = PressReleaseTranslation::orderBy('id', 'DESC')->where('language_id', $request->lng_id)->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get()->toArray();


        $news = NewsTranslation::orderBy('id', 'DESC')->where('language_id', $request->lng_id)->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get()->toArray();

        $region = MapRegionInfoTranslation::orderBy('id', 'DESC')->where('language_id', $request->lng_id)->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get()->toArray();

        $data = array_merge($current_earthquakes, $press_release, $news, $region);

        $data = collect($data)->sortBy('created_at')->all();

        $data = $this->paginate($data);

        return is_null($data) ? $this->sendError('error') :
               $this->sendResponse(SmartSearchResource::collection($data), 'success', $data->lastPage());
    }

    public function paginate($items, $perPage = 10, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total   ,$perPage);
    }
}
