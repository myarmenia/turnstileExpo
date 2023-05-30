<?php

namespace App\Http\Controllers\GlobalMonitoring;

use App\Http\Controllers\Controller;
use App\Models\MapRegionInfo;
use App\Models\MapRegionInfoTranslation;
use App\Models\Region;
use App\Models\RegionInfo;
use App\Models\RegionInfoTranslation;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GlobalMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $regions = Region::where('parent_id',null)->with('region_translations')->latest()->get();

        return view('regions.index',compact('regions'));
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
// dd($request->all());
            $validate = [

                "image_path" => "required | mimes:jpeg,jpg,png,PNG | max:10000",
                "schema_path" => "required | mimes:jpeg,jpg,png,PNG | max:10000",
                "translations.*.title"=> "required",
                "translations.*.description"=> "required",
                "region_info_files"=>"required"

            ];
            $validator = Validator::make($request->all(), $validate);
            $request['editor_id']=Auth::id();

            if($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $map_region_info = MapRegionInfo::create($request->all());
            if($request->has('image_path')){
                $path=FileUploadService::upload($request->image_path,'region_info/'.$map_region_info->id);
                $map_region_info->image_path=$path;
                $map_region_info->save();

            }
            if($request->has('schema_path')){
                $path=FileUploadService::upload($request->schema_path,'region_info/'.$map_region_info->id);
                $map_region_info->schema_path=$path;
                $map_region_info->save();

            }
            foreach ($request->translations as $key => $item) {
                // dd($region_info->id);

                MapRegionInfoTranslation::create([
                    'map_region_info_id' => $map_region_info->id,
                    'language_id' => $key,
                    'title' => $item['title'],
                    'description' => $item['description'],
                ]);
            }
            foreach ($request->region_info_files as $key => $item) {

                $f_extension = $item->getClientOriginalExtension();
                $type="image";

                $f_path = FileUploadService::upload($item, 'region_info/'.$map_region_info->id);
                $map_region_info->files()->create(['path' => $f_path, 'name'=>$item->getClientOriginalName() ,'type'=>$type]);
            }

            return redirect()->back();



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

        $region=Region::find($id);

        $map_region_id=$region->map_regions[0]->pivot->map_region_id;

        $map_region_info=MapRegionInfo::where('map_region_id',$map_region_id)->first();

        if($map_region_info==null){
            return view('regions.store',compact('map_region_info','map_region_id'));
        }else{
            return view('regions.edit',compact('map_region_info'));
        }

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

        $map_region_info = MapRegionInfo::where('id',$id)->first();

        $validate = [
            "translations.*.title"=> "required",
            "translations.*.description"=> "required",
        ];
        if($request->has('image_path')) {
            $validate['image_path']="required | mimes:jpeg,jpg,png,PNG | max:10000";
        }
        if($request->has('image_path')) {
            $validate['image_path']="required | mimes:jpeg,jpg,png,PNG | max:10000";
        }

        $validator = Validator::make($request->all(), $validate);
        $request['editor_id']=Auth::id();

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->has('image_path')){
            $path=FileUploadService::upload($request->image_path,'region_info/'.$id);
            $map_region_info->image_path=$path;
            $map_region_info->save();

        }

        if($request->has('schema_path')){
            $path=FileUploadService::upload($request->schema_path,'region_info/'.$map_region_info->id);
            $map_region_info->schema_path=$path;
            $map_region_info->save();
        }

        foreach($request->translations as $key=>$item){
            $map_region_info->translation($key)->update($item);

        }

        if($request->has('region_info_files')){

            $map_region_info->files()->detach();
            $map_region_info->files()->delete();

            foreach ($request->region_info_files as $key => $item) {

                $f_extension = $item->getClientOriginalExtension();
                $type="image";

                $f_path = FileUploadService::upload($item, 'region_info/'. $map_region_info->id);
                $map_region_info->files()->create(['path' => $f_path, 'name'=>$item->getClientOriginalName() ,'type'=>$type]);
            }
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
