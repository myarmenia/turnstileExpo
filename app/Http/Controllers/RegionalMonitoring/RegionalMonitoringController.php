<?php

namespace App\Http\Controllers\RegionalMonitoring;

use App\Http\Controllers\Controller;
use App\Models\RegionalMonitoring;
use App\Models\RegionalMonitoringTranslation;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegionalMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regional_monitoring = RegionalMonitoring::first();

        if ($regional_monitoring != null) {
            return view('regional-monitoring.edit', compact('regional_monitoring'));
        } else {
            return view('regional-monitoring.create');
        }
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

        $requestData = $request->all();

        $validate = [
            "title.*" => "required",
            "image" => "required",
            "items" => "required",
        ];

        $validator = Validator::make($requestData, $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $f_extension = $request['image']->getClientOriginalExtension();
        $f_path = FileUploadService::upload($request['image'], 'regional-monitoring/');

        $create_regional_monitoring = RegionalMonitoring::create([
            'image_path' => $f_path
        ]);

        foreach ($request->title as $key => $title) {
            RegionalMonitoringTranslation::create([
                'region_id' => $create_regional_monitoring->id,
                'language_id' => $key,
                'title' => $title,
            ]);
        }

        foreach ($request->items as $key => $image) {
            $f_extension = $image->getClientOriginalExtension();

            $f_type = 'image';
            if ($f_extension == 'mp4' || $f_extension == 'avi' || $f_extension == 'mkv') {
                $f_type = 'video';
            }

            $f_path = FileUploadService::upload($image, 'regional-monitoring-items/' . $create_regional_monitoring->id);
            $create_regional_monitoring->files()->create(['path' => $f_path, 'type' => $f_type]);
        }

        return redirect('regional-monitoring');
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

        $regional_monitoring = RegionalMonitoring::find($id);

        $requestData = $request->all();

        $validate = [
            "title.*" => "required",
        ];

        $validator = Validator::make($requestData, $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->has('image')) {

            $delete_image = $regional_monitoring->image_path;

            $delete_image != null ? Storage::delete($delete_image) : null;

            $f_extension = $request->image->getClientOriginalExtension();
            $f_path = FileUploadService::upload($request['image'], 'regional-monitoring/');

            $regional_monitoring->update([
                'image_path' => $f_path
            ]);
        }

        foreach ($request->title as $key => $title) {
            $regional_monitoring_translation = RegionalMonitoringTranslation::where('region_id', $id)->where('language_id', $key)->first();
            $regional_monitoring_translation->update([
                'title' => $title,
            ]);
        }

        if($request->has('items')) {
            foreach ($request->items as $key => $image) {
                $f_extension = $image->getClientOriginalExtension();

                $f_type = 'image';
                if ($f_extension == 'mp4' || $f_extension == 'avi' || $f_extension == 'mkv') {
                    $f_type = 'video';
                }

                $f_path = FileUploadService::upload($image, 'regional-monitoring-items/' . $regional_monitoring->id);
                $regional_monitoring->files()->create(['path' => $f_path, 'type' => $f_type]);
            }
        }

        return redirect('regional-monitoring');

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
