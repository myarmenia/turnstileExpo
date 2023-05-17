<?php

namespace App\Http\Controllers\CurrentEarthquakes;

use App\Http\Controllers\Controller;
use App\Models\CurrentEarthquake;
use App\Models\CurrentEarthquakesTranslations;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $current_earthquakes = CurrentEarthquake::orderBy('id', 'DESC');

        if ($request->date_from) {
            $current_earthquakes = $current_earthquakes->where('date', '>=', $request->date_from);
        }

        if ($request->date_to) {
            $current_earthquakes = $current_earthquakes->where('date', '<=', $request->date_to);
        }

        if ($request->status) {
            $current_earthquakes = $current_earthquakes->where('status', $request->status);
        }

        if ($request->magnitude) {
            $current_earthquakes = $current_earthquakes->where('magnitude', $request->magnitude);
        }

        if ($request->title) {
            $current_earthquakes_id = CurrentEarthquakesTranslations::orderBy('id', 'DESC')->where('language_id', 1)->where('title', 'like', '%' . $request->title . '%')->pluck('current_earthquake_id');
            $current_earthquakes = $current_earthquakes->whereIn('id', $current_earthquakes_id);
            // $current_earthquakes = $current_earthquakes->where('title_en', 'like', '%' . $request->title . '%');
        }

        $current_earthquakes = $current_earthquakes
            ->with('current_earthquakes_translations', function ($query) {
                return $query->where('language_id', 1);
            })->paginate(6)->withQueryString();

        return view('current-earthquakes.index', compact("current_earthquakes"))
            ->with('i', ($request->input('page', 1) - 1) * 6);
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
            "tanslations.*.title" => "required",
            "tanslations.*.description" => "required",
            "date" => "required",
            "time" => "required",
            "magnitude" => "required",
            "items" => "required",
            "links.*" => "required"
        ];

        $request['editor_id'] = Auth::id();

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $current_earthquakes = CurrentEarthquake::create($request->all());

        // if ($request->has('banner')) {
        //     $path_banner = FileUploadService::upload($request->banner, 'current-earthquakes/' . $current_earthquakes->id);
        //     $current_earthquakes->banner = $path_banner;
        //     $current_earthquakes->save();
        // }


        foreach ($request->tanslations as $key => $item) {
            // dd($item['title']);
            CurrentEarthquakesTranslations::create([
                'current_earthquake_id' => $current_earthquakes->id,
                'language_id' => $key,
                'title' => $item['title'],
                'description' => $item['description'],
            ]);
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
        $current_earthquake = CurrentEarthquake::where('id', $id)
            ->with('current_earthquakes_translations')->with('links')->with('files')->first();

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
            "tanslations.*.title" => "required",
            "tanslations.*.description" => "required",
            "date" => "required",
            "time" => "required",
            "magnitude" => "required",
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

        foreach ($request->tanslations as $key => $item) {

            $current_earthquakes_translations = $current_earthquake->current_earthquakes_translations;

            $current_earthquakes_translations = $current_earthquakes_translations->where('language_id', $key)->first();

            $current_earthquakes_translations->update([
                'title' => $item['title'],
                'description' => $item['description']
            ]);
        }

        if ($request->has('items')) {
            foreach ($request->items as $key => $image) {

                $f_extension = $image->getClientOriginalExtension();
                $f_type = 'image';
                if ($f_extension == 'mp4' || $f_extension == 'mov' || $f_extension == 'ogg') {
                    $f_type = 'video';
                }
                $f_path = FileUploadService::upload($image, 'current-earthquakes/' . $current_earthquake->id);
                $current_earthquake->files()->create(['path' => $f_path, 'type' => $f_type]);
            }
        }

        if ($request->has('links')) {

            $current_earthquake->links()->detach();
            $current_earthquake->links()->delete();

            foreach ($request->links as $key => $link) {
                $current_earthquake->links()->create(['link' => $link, 'type' => 'current_earthquakes']);
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
