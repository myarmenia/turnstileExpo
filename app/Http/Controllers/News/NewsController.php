<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {

        $request['table'] = 'news';
        $this->middleware('editor', ['only' => ['edit', 'update']]);

    }

    public function index(Request $request)
    {

        // dd($request->all());
        $paginate=2;
        $i=$request['page'] ? ($request['page']-1)*$paginate : 0;
        $query=News::latest();
        if($request->has('title')){
            $title = $request->title;
            $news_translation=NewsTranslation::latest()
                                ->where('title', 'like', '%' . $title . '%')
                                ->pluck('news_id')->toArray();
                                $query=$query->whereIn('id', $news_translation);


        }
        if($request->has('status')){
            $query = $query->where('status', $request->status);
        }
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
        $validate = [
            "image" => "required | mimes:jpeg,jpg,png,PNG | max:10000",
            "translations.*.title"=> "required",
            "translations.*.description"=> "required",
        ];

        if($request->button_link!=null ){
            $validate['button_link']="required|url";
            $validate["translations.*.button_text"]="required";
        }

        foreach($request->translations as $item){
            if($item['button_text']!=null && $request->button_link==null){
                $validate['button_link']="required|url";
                $validate["translations.*.button_text"]="required";
            }
        }

        $validator = Validator::make($request->all(), $validate);
        if($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $news = News::create([
            'image'=>'',
            'editor_id'=>Auth::id(),

        ]);
        if($news){
            $path=FileUploadService::upload($request->image,'news/'.$news->id);
            $news->image=$path;
            $news->save();

            foreach($request->translations as $key=>$item){

                $news_translate = NewsTranslation::create([
                    "news_id" => $news->id,
                    "language_id" => $key,
                    "title" => $item['title'],
                    "description" => $item['description'],
                ]);
                if($item['button_text']!=null){
                    $update_news_translate = NewsTranslation::where('id',$news_translate->id)->first();
                    $update_news_translate->button = $item['button_text'];
                    $update_news_translate->save();

                }

            }

            if($request->button_link!=null ){
                $news->button_link = $request->button_link;
                $news->save();
            }



        }
        return redirect('news');




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

        $validate = [

            "translations.*.title"=> "required",
            "translations.*.description"=> "required",

        ];
        if($request->button_link!=null ){

            $validate['button_link']="required|url";
            $validate["translations.*.button"]="required";
        }
        foreach($request->translations as $item){
            if($item['button']!=null && $request->button_link==null){
                $validate['button_link']="required|url";
                $validate["translations.*.button"]="required";
            }
        }
        if($request->has('image')){
            $validate['image']="required | mimes:jpeg,jpg,png,PNG | max:10000";
        }

        $validator = Validator::make($request->all(), $validate);

        if($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $news=News::find($id);

        if($request->has('image')){

            Storage::delete($news->image);
            $path=FileUploadService::upload($request->image,'news/'.$id);
            $news->image=$path;
            $news->save();

        }
        if($request->has('button_link')){
            $news->button_link=$request->button_link;
            $news->save();
        }
        foreach($request->translations as $key=>$item){

            $news->translation($key)->update($item);
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
            $news=News::where('id',$id)->first();
            $deleted=$news->delete();
            if($deleted){
                return redirect()->back();
            }
    }
}
