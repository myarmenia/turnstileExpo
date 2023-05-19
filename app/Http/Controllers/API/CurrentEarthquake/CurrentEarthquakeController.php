<?php

namespace App\Http\Controllers\API\CurrentEarthquake;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CurrentEarthquakesResource;
use App\Http\Resources\SingleCurrentEarthquakesResource;
use App\Models\CurrentEarthquake;
use App\Models\Language;
use Illuminate\Http\Request;

class CurrentEarthquakeController extends BaseController
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $current_earthquakes = CurrentEarthquake::where('status', 'confirmed')->orderBy('id', 'desc')->paginate(12);

        return is_null($current_earthquakes) ? $this->sendError('error message') :
            $this->sendResponse(CurrentEarthquakesResource::collection($current_earthquakes), 'success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_earthquakes = CurrentEarthquake::find($id);

        return is_null($current_earthquakes) ? $this->sendError('error') :
               $this->sendResponse(new SingleCurrentEarthquakesResource($current_earthquakes), 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
