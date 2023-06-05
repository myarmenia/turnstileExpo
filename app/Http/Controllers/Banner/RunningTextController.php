<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\RunningText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RunningTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create_run');
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

            'running_text.*.content'=>'required',
            'running_link'=>'required|url',
        ];
        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach($request->running_text as $key=>$item){
            // dd($item);
            $running_text=RunningText::create([
                'language_id'=>$key,
                'content'=>$item['content'],
                'link'=>$request->running_link,
            ]);
        }


           return redirect('/banner');

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

        $running_text=RunningText::all();
        return view('banner.edit_run',compact('running_text','id'));
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

        $validate = [

            "running_text.*.content"=> "required",
            "running_link"=>"required | url"

        ];
        $validator = Validator::make($request->all(), $validate);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach($request->running_text as $key=>$item){

            $running_text=RunningText::where('language_id',$key)->update(['content'=>$item['content'],'link'=>$request->running_link]);

        }
        return redirect('/running-text/'.$id.'/edit');

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
