<?php

namespace App\Http\Controllers\PressReleases;

use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('press-release.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('press-release.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        $validate = [
                    "logo" => "required | mimes:jpeg,jpg,png,PNG,JPG | max:2048",
                    "title_en" => "required",
                    "title_am" => "required",
                    "title_ru" => "required",
                    "date" => "required",
                    "time" => "required",
                    "description_en" => "required",
                    "description_am" => "required",
                    "description_ru" => "required",
                    "items" => "required | mimes:mp4,mov,ogg,qt,jpeg,jpg,png,PNG,JPG | max:20000",
                    "links.*" => "required"
        ];

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $press_releases = PressRelease::create($request->all());

        if($request->has('logo')){
            $path_logo = FileUploadService::upload($request->logo,'press-releases/'.$press_releases->id);
            $press_releases->logo = $path_logo;
            $press_releases->save();
        }

        foreach ($request->items as $key => $image) {

            $f_extension = $image->getClientOriginalExtension();
            $f_type = 'image';
            if($f_extension == 'mp4' || $f_extension == 'avi' || $f_extension == 'mkv'){
                $f_type = 'video';
            }
            $f_path = FileUploadService::upload($image,'press-releases/'.$press_releases->id);
            $press_releases->files()->create(['path'=>$f_path, 'type'=>$f_type ]);
        }

        if($request->has('links')){
            foreach ($request->links as $key => $link) {

                $press_releases->links()->create(['link' => $link, 'type' => 'press_release' ]);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $press_release = PressRelease::find($id);

        return view('press-release.edit', compact('press_release'));

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
