<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerTranlation;
use App\Models\RunningText;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $i=0;
        $banner=Banner::all();

        $running_text=RunningText::first();


        return view('banner.index',compact('banner','running_text','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate=[
            'translations.*.content'=>'required',
            'path' => "required | max:2048",

        ];
        $validator = Validator::make($request->all(), $validate);
        if ($validator->fails()) {
            // return response()->json(['errors'=>$validator->errors()], 404);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $banner=Banner::create([
            'path'=>$request->path
        ]);

        $banner=Banner::find($banner->id);

        $path=FileUploadService::upload($request->path,'banner/'.$banner->id);
        $banner->path= $path;
        $banner->save();

        foreach($request->translations as $key=>$item){

            $banner_translate = BannerTranlation::create([
                'banner_id'=>$banner->id,
                'language_id'=>$key,
                'content'=>$item['content']
            ]);

        }
        return redirect('banner');



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
        $banner = Banner::where('id',$id)->first();

        return view('banner.edit',compact('banner'));

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
        // dd($request->all());


        $banner = Banner::find($id);

        $validate = [
            "translations.*.content"=> "required",
        ];

        if($request->has('path')) {
            $validate['path']="required | max:2048";
        }

        $validator = Validator::make($request->all(), $validate);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        foreach($request->translations as $key=>$item){

            $banner->translation($key)->update($item);

        }

        if($request->has('path')){
            Storage::delete($banner->path);
            $path=FileUploadService::upload($request->path,'banner/'.$id);
            $banner->path=$path;
            $banner->save();

        }
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $banner=Banner::where('id', $id)->first();;

        Storage::delete( $banner->path);
        $deleted= $banner->delete();


        if($deleted) {
            if ($request->_method != null) {

                    Storage::disk('public')->deleteDirectory('banner/'.$id);


                return redirect()->back();
            } else {
                return response()->json(['result' => 1], 200);
            }
        }

    }
}
