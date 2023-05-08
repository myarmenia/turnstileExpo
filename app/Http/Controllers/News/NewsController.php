<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate=2;
        $i=$request['page'] ? ($request['page']-1)*$paginate : 0;
        $query=News::latest();

        $news=$query->paginate(2)->withQueryString();

        return view('news.index',compact('news','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');

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
                    "image" => "required | mimes:jpeg,jpg,png,PNG | max:10000",
                    "title_en" => "required",
                    "title_am" => "required",
                    "title_ru" => "required",
                    "description_en" => "required",
                    "description_am" => "required",
                    "description_ru" => "required",
        ];
        if($request->button_link!=null || $request->button_text_en!=null || $request->button_text_am!=null || $request->button_text_ru!=null){
            $validate['button_link']="required|url";
            $validate['button_text_en']="required";
            $validate['button_text_am']="required";
            $validate['button_text_ru']="required";

        }

        $validator = Validator::make($request->all(), $validate);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($request->all());
        $news = News::create($request->all());
        if($request->image!=null){
            $path=FileUploadService::upload($request->image,'news/'.$news->id);
            $news->image=$path;
            $news->save();


        }
        if($news){
            return redirect('/news');
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
        $news=News::where('id',$id)->first();
        return view('news.edit',compact('news'));
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
        $validate = [
            // "image" => "required | mimes:jpeg,jpg,png,PNG | max:10000",
            "title_en" => "required",
            "title_am" => "required",
            "title_ru" => "required",
            "description_en" => "required",
            "description_am" => "required",
            "description_ru" => "required",

        ];
        if($request->button_link!=null || $request->button_text_en!=null || $request->button_text_am!=null || $request->button_text_ru!=null){
            $validate['button_link']="required|url";
            $validate['button_text_en']="required";
            $validate['button_text_am']="required";
            $validate['button_text_ru']="required";

        }
        if($request->has('image')){
            $validate['image']="required | mimes:jpeg,jpg,png,PNG | max:10000";
        }
        $news=News::where('id',$id)->first();
        if($news->image==null){

            $validate['image']="required | mimes:jpeg,jpg,png,PNG | max:10000";
        }

        $validator = Validator::make($request->all(), $validate);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $news_update = News::where('id',$id)->update([
            "title_en" => $request->title_en,
            "title_am" => $request->title_am,
            "title_ru" => $request->title_ru,
            "description_en" =>$request->description_en,
            "description_am" =>$request->description_am,
            "description_ru" =>$request->description_ru,
        ]);

        if($request->has('image')){
            Storage::delete($news->image);
            $path=FileUploadService::upload($request->image,'news/'.$id);
            $news->image=$path;
            $news->save();

        }

        if($request->button_link!=null || $request->button_text_en!=null || $request->button_text_am!=null || $request->button_text_ru!=null){
            $news->button_link=$request->button_link;
            $news->button_text_en=$request->button_text_en;
            $news->button_text_am=$request->button_text_am;
            $news->button_text_ru=$request->button_text_ru;
            $news->save();
        }

        if($news){

            $news=News::where('id',$id)->first();
            return view('news.edit',compact('news'));

        }
    }
    public function deleteFile($id){
        $news=News::where('id',$id)->first();

        Storage::delete($news->image);
        $news->image='';
        $news->save();



        return response()->json(['message'=>'deleted']);

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
