<?php

namespace App\Http\Controllers\ScientificPublications;

use App\Http\Controllers\Controller;
use App\Models\ScientificPublications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScientificPublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('content')) {
            $scientific_publications = ScientificPublications::where('content_en', 'like', '%' . $request->content . '%')->paginate(6)->withQueryString();
        } else {
            $scientific_publications = ScientificPublications::paginate(6)->withQueryString();
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
