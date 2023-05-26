<?php

namespace App\Http\Controllers\API\PressReleases;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\PressReleaseResource;
use App\Models\Language;
use App\Models\PressRelease;
use App\Models\PressReleaseTranslation;
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

        $press_releasae = PressRelease::orderBy('id', 'DESC');

        if ($request->has('search')) {
            $search = $request->search;
            $press_releasae_id = PressReleaseTranslation::orderBy('id', 'DESC')->where('language_id', $request->lng_id)->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })->pluck('press_release_id');
            $press_releasae = $press_releasae->whereIn('id', $press_releasae_id);
        }

        if ($request->has('date_from')) {
            $press_releasae = $press_releasae->where('date', '>=', $request->date_from);
        }

        if ($request->has('date_to')) {
            $press_releasae = $press_releasae->where('date', '<=', $request->date_to);
        }

        $press_releasae = $press_releasae->paginate(12);

        return is_null($press_releasae) ? $this->sendError('error message') :
            $this->sendResponse(PressReleaseResource::collection($press_releasae), 'success', $press_releasae->lastPage());
    }
}
