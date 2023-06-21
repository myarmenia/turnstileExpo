<?php

namespace App\Http\Controllers\API\PressReleases;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\PressReleaseResource;
use App\Http\Resources\SinglePressReleaseResource;
use App\Models\Language;
use App\Models\PressRelease;
use Illuminate\Http\Request;

class PressReleaseController extends BaseController
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $press_releases = PressRelease::where('status', 'confirmed')->orderBy('date', 'desc')->paginate(12);
        $press_releases->lp = $press_releases->lastPage();

        return is_null($press_releases) ? $this->sendError('error message') :
               $this->sendResponse( PressReleaseResource::collection($press_releases), 'success', $press_releases->lastPage());

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
        $press_release = PressRelease::find($id);

        return is_null($press_release) ? $this->sendError('error') :
               $this->sendResponse(new SinglePressReleaseResource($press_release), 'success');

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
