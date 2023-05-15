<?php

namespace App\Http\Controllers\PressReleases;

use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use App\Models\PressReleaseTranslation;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $press_releases = PressRelease::orderBy('id', 'DESC');

        if ($request->from) {
            $press_releases = $press_releases->where('date', '>=', $request->from);
        }

        if ($request->to) {
            $press_releases = $press_releases->where('date', '<=', $request->to);
        }

        if ($request->status) {
            $press_releases = $press_releases->where('status', $request->status);
        }

        if ($request->title) {
            $title = $request->title;
            $press_releases = $press_releases->where(function ($query) use ($title) {
                $query->where('title_en', 'like', '%' . $title . '%')
                    ->orWhere('title_ru', 'like', '%' . $title . '%')
                    ->orWhere('title_am', 'like', '%' . $title . '%');
            });
        }

        $press_releases = $press_releases->paginate(6)->withQueryString();

        return view('press-release.index', compact('press_releases'))
            ->with('i', ($request->input('page', 1) - 1) * 6);
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

                    "logo" => "required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:2048",
                    "translations.*.title" => "required",
                    "translations.*.description" => "required",
                    "date" => "required",
                    "time" => "required",
                    "items" => "required",
                    "items.*" => "mimes:mp4,mov,ogg,jpeg,jpg,png,PNG,JPG,JPEG | max:20000",
                    "links.*" => "required"

        ];

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
           
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $press_releases = PressRelease::create($request->all());

        if ($request->has('logo')) {
            $path_logo = FileUploadService::upload($request->logo, 'press-releases/' . $press_releases->id);
            $press_releases->logo = $path_logo;
            $press_releases->save();
        }

        foreach ($request->translations as $key => $item) {
            // dd($item['title']);
            PressReleaseTranslation::create([
                'press_release_id' => $press_releases->id,
                'language_id' => $key,
                'title' => $item['title'],
                'description' => $item['description']

            ]);
        }

        foreach ($request->items as $key => $image) {

            $f_extension = $image->getClientOriginalExtension();
            $f_type = 'image';
            if ($f_extension == 'mp4' || $f_extension == 'mov' || $f_extension == 'ogg') {
                $f_type = 'video';
            }
            $f_path = FileUploadService::upload($image, 'press-releases/' . $press_releases->id);
            $press_releases->files()->create(['path' => $f_path, 'type' => $f_type]);
        }

        if ($request->has('links')) {
            foreach ($request->links as $key => $link) {

                $press_releases->links()->create(['link' => $link, 'type' => 'press_release']);
            }
        }

        return redirect()->route('press-release.index');
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
        $press_releases = PressRelease::find($id);
        $logo_path = $press_releases->logo;
        // dd($request->all());
        $requestData = $request->all();

        $validate = [
            "title_en" => "required",
            "title_am" => "required",
            "title_ru" => "required",
            "date" => "required",
            "time" => "required",
            "description_en" => "required",
            "description_am" => "required",
            "description_ru" => "required",
            "links.*" => "required"

        ];

        if ($request->has('logo')) {
            $validate["logo"] = "required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:2048";
        }
        if ($press_releases->links == null || $request->has('links')) {
            $validate["links.*"] = "required";
        }

        if ($press_releases->files == null || $request->has('items')) {
            $validate["items.*"] = "required | mimes:jpeg,jpg,png,PNG,JPG,JPEG | max:20000";
        }

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $press_releases->update($requestData);

        if ($request->has('logo')) {
            Storage::delete($logo_path);

            $path_logo = FileUploadService::upload($request->logo, 'press-releases/' . $press_releases->id);
            $press_releases->logo = $path_logo;
            $press_releases->save();
        }


        if ($request->has('items')) {
            foreach ($request->items as $key => $image) {

                $f_extension = $image->getClientOriginalExtension();
                $f_type = 'image';
                if ($f_extension == 'mp4' || $f_extension == 'mov' || $f_extension == 'ogg') {
                    $f_type = 'video';
                }
                $f_path = FileUploadService::upload($image, 'press-releases/' . $press_releases->id);
                $press_releases->files()->create(['path' => $f_path, 'type' => $f_type]);
            }
        }

        if ($request->has('links')) {

            $press_releases->links()->detach();
            $press_releases->links()->delete();

            foreach ($request->links as $key => $link) {

                $press_releases->links()->create(['link' => $link, 'type' => 'press_release']);
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $press_releases = PressRelease::where('id', $id)->first();
        $deleted = $press_releases->delete();
        if ($deleted) {
            return redirect()->back();
        }
    }
}
