<?php

namespace App\Http\Controllers\API\CurrentEarthquake;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CurrentEarthquakesResource;
use App\Models\CurrentEarthquake;
use App\Models\CurrentEarthquakesTranslations;
use App\Models\Language;
use Illuminate\Http\Request;


class FilterController extends BaseController
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

    public function filter(Request $request)
    {

        $current_earthquakes = CurrentEarthquake::orderBy('id', 'DESC');

        if ($request->has('search')) {
            $search = $request->search;
            $current_earthquakes_id = CurrentEarthquakesTranslations::orderBy('id', 'DESC')->where('language_id', $request->lng_id)->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })->pluck('current_earthquake_id');
            $current_earthquakes = $current_earthquakes->whereIn('id', $current_earthquakes_id);
        }

        if ($request->has('date_from')) {
            $current_earthquakes = $current_earthquakes->where('date', '>=', $request->date_from);
        }

        if ($request->has('date_to')) {
            $current_earthquakes = $current_earthquakes->where('date', '<=', $request->date_to);
        }

        if ($request->has('magnitude')) {
            $current_earthquakes = $current_earthquakes->where('magnitude', $request->magnitude);
        }

        $current_earthquakes = $current_earthquakes->paginate(12);

        return is_null($current_earthquakes) ? $this->sendError('error message') :
            $this->sendResponse(CurrentEarthquakesResource::collection($current_earthquakes), 'success', $current_earthquakes->lastPage());
    }
}
