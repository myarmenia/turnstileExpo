<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerTranlation;
use App\Models\RunningText;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
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
        $banner=Banner::all();
        $running_text=RunningText::all();

        return view('banner.index',compact('banner','running_text'));
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
            'section.*.translations.*.content'=>'required',
            'section.*.path' =>'required',
            'running_text.*.content'=>'required',
            'running_link'=>'required|url',
        ];
        $validator = Validator::make($request->all(), $validate);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 404);
        }

        foreach($request->section as$key=>$item){
            $banner=Banner::create([
                'path'=>$item['path']
            ]);

            $path=FileUploadService::upload($item['path'],'banner/'.$banner->id);
            $banner->path= $path;
            $banner->save();

            foreach($item['translations'] as $k=>$data){

                $banner_translate = BannerTranlation::create([
                    'banner_id'=>$banner->id,
                    'language_id'=>$k,
                    'content'=>$data['content']
                ]);
            }


            // return redirect()->back();

        }
        foreach($request->running_text as $key=>$item){
            // dd($item);
            $running_text=RunningText::create([
                'language_id'=>$key,
                'content'=>$item['content'],
                'link'=>'link',
            ]);

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
        $banner = Banner::where('id',$id)->first();
        $banner_translation=BannerTranlation::where('banner_id',$id)->get();

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

        $banner = Banner::where('id',$id)->first();
        $validate = [

            "translations.*.content"=> "required",
        ];
        if($request->has('path')) {
            $validate['path']="required | mimes:jpeg,jpg,png,PNG | max:10000";
        }

        $validator = Validator::make($request->all(), $validate);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        foreach($request->translations as $key=>$item){
            $banner->translation($key)->update($item);

        }

        if($request->has('path')){
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
    public function destroy($id)
    {
        //
    }
}
