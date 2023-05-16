<?php

namespace App\Http\Controllers\ScientificPublications;

use App\Http\Controllers\Controller;
use App\Models\ScientificPublications;
use App\Models\ScientificPublicationsLanguages;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ScientificPublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // ->withQueryString();

        if ($request->has('content')) {

            $sc_publications_id = ScientificPublicationsLanguages::orderBy('id', 'DESC')->where('language_id', 1)->where('content', 'like', '%' . $request->content . '%')->pluck('sc_publication_id');
            $scientific_publications = ScientificPublications::whereIn('id', $sc_publications_id)->paginate(6);
        } else {


            $scientific_publications = ScientificPublications::orderBy('id', 'DESC')
                ->with('scientific_publication_languages', function ($query) {
                    return $query->where('language_id', 1);
                })->paginate(6);
        }

        return view("scientific-publications.index", compact('scientific_publications'))
            ->with('i', ($request->input('page', 1) - 1) * 6);
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

        $scientific_publication = ScientificPublications::where('id', $id)->first();


        return view("scientific-publications.edit", compact('scientific_publication'));
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

        $requestData = $request->all();

        $validate = [
            'content.*' => 'required'
        ];

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $scientific_publication = ScientificPublications::find($id);
        $scientific_publications_language = ScientificPublicationsLanguages::where("sc_publication_id", $id)->get();

        if ($request->has('file')) {

            $scientific_publication->file_path != null ? Storage::delete($scientific_publication->file_path) : null;

            $f_path = FileUploadService::upload($request->file, 'scientific-publications/' . $id);
            $scientific_publication->update(['file_path' => $f_path]);
        }

        foreach ($scientific_publications_language as $key => $publication_language) {
            $publication_language->update([
                'content' => $request->content[++$key]
            ]);
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
