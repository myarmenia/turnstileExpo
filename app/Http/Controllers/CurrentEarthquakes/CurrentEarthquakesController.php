<?php

namespace App\Http\Controllers\CurrentEarthquakes;

use App\Http\Controllers\Controller;
use App\Models\CurrentEarthquake;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrentEarthquakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->status) {
            dd($request->all());

            $title = null;
            $magnitude = null;
            $date_from = null;
            $date_to = null;

            if ($request->title != null) {
                $title = $request->title;
            }

            if ($request->magnitude != null) {
                $magnitude = $request->magnitude;
            }

            if ($request->date_from != null) {
                $date_from = $request->date_from;
            }

            if ($request->date_to != null) {
                $date_to = $request->date_to;
            }

            $current_earthquakes = CurrentEarthquake::where('status', $request->status)->where('magnitude', $magnitude)->where('date_from', '>=', $date_from)->where('date_to', '<=', $date_to);
        }

        $current_earthquakes = CurrentEarthquake::where('status', 'new')->paginate(1);

        return view('current-earthquakes.index', compact("current_earthquakes"))->with('i', ($request->input('page', 1) - 1) * 1);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('current-earthquakes.create');
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
            // "banner" => "required | mimes:jpeg,jpg,png,PNG | max:10000",
            "title_en" => "required",
            "title_am" => "required",
            "title_ru" => "required",
            "date" => "required",
            "time" => "required",
            "magnitude" => "required",
            "description_en" => "required",
            "description_am" => "required",
            "description_ru" => "required",
            "items" => "required",
            "links.*" => "required"
        ];


        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $current_earthquakes = CurrentEarthquake::create($request->all());

        if ($request->has('banner')) {
            $path_banner = FileUploadService::upload($request->banner, 'current-earthquakes/' . $current_earthquakes->id);
            $current_earthquakes->banner = $path_banner;
            $current_earthquakes->save();
        }

        foreach ($request->items as $key => $image) {

            $f_extension = $image->getClientOriginalExtension();
            $f_type = 'image';
            if ($f_extension == 'mp4' || $f_extension == 'avi' || $f_extension == 'mkv') {
                $f_type = 'video';
            }
            $f_path = FileUploadService::upload($image, 'current-earthquakes/' . $current_earthquakes->id);
            $current_earthquakes->files()->create(['path' => $f_path, 'type' => $f_type]);
        }

        if ($request->has('links')) {
            foreach ($request->links as $key => $link) {
                $current_earthquakes->links()->create(['link' => $link, 'type' => 'current_earthquakes']);
            }
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
        $current_earthquake = CurrentEarthquake::where('id', $id)->with('links')->with('files')->first();

        return view('current-earthquakes.edit', compact('current_earthquake'));
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

        $current_earthquake = CurrentEarthquake::find($id);

        $requestData = $request->all();

        $validate = [
            // "banner" => "required | mimes:jpeg,jpg,png,PNG | max:10000",
            "title_en" => "required",
            "title_am" => "required",
            "title_ru" => "required",
            "date" => "required",
            "time" => "required",
            "magnitude" => "required",
            "description_en" => "required",
            "description_am" => "required",
            "description_ru" => "required",
        ];

        if ($current_earthquake->links == null || $request->has('links')) {
            $validate["links.*"] = "required";
        }

        if ($current_earthquake->files == null || $request->has('items')) {
            $validate["items.*"] = "required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:20000";
        }


        $validator = Validator::make($requestData, $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $current_earthquake->update($requestData);

        if ($request->has('items')) {
            foreach ($request->items as $key => $image) {

                $f_extension = $image->getClientOriginalExtension();
                $f_type = 'image';
                if ($f_extension == 'mp4' || $f_extension == 'mov' || $f_extension == 'ogg') {
                    $f_type = 'video';
                }
                $f_path = FileUploadService::upload($image, 'press-releases/' . $current_earthquake->id);
                $current_earthquake->files()->create(['path' => $f_path, 'type' => $f_type]);
            }
        }

        if ($request->has('links')) {

            $current_earthquake->links()->detach();
            $current_earthquake->links()->delete();

            foreach ($request->links as $key => $link) {
                $current_earthquake->links()->create(['link' => $link, 'type' => 'press_release']);
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
        $current_earthquake = CurrentEarthquake::find($id);
        $current_earthquake->delete();

        return redirect()->back();
    }
}
