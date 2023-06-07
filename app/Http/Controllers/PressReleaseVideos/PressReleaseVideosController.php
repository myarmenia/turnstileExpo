<?php

namespace App\Http\Controllers\PressReleaseVideos;

use App\Http\Controllers\Controller;
use App\Models\VideoLink;
use App\Models\VideoLinkTranslation;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PressReleaseVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $first_video_link = VideoLink::first();
        $video_link = VideoLink::all();

        if ($first_video_link != null) {
            return view('video-link.edit', compact('video_link'));
        } else {
            return view('video-link.create');
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

        $validate = [];

        foreach ($request->links as $k => $link) {

            if ($link['link'] != null) {
                $validate["links.$k.title.*"] = 'required';

                if (!str_contains($link['link'], 'youtube.com/watch?v=') && !str_contains($link['link'], 'youtu.be/')) {
                    // dd('url error');
                    $validate["links.$k.link"] = 'url';
                }

            }

            foreach ($link['title'] as $p => $title) {

                if ($title != null) {
                    $validate["links.$k.title.*"] = 'required';
                    $validate["links.$k.link"] = 'required';
                }
            }
        }

        $validator = Validator::make($request->all(), $validate);


        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        foreach ($request->links as $link_key => $link) {

            if ($link['link'] != null) {

                if (str_contains($link['link'], 'youtube.com/watch?v=')) {
                    $pl_list = str_replace('https://www.youtube.com/watch?v=', '', $link['link']);
                    $playlist = explode('&', $pl_list)[0];
                    $video_iframe = "<iframe width='460' height='165' src='https://www.youtube.com/embed/$playlist' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                }
                if (str_contains($link['link'], 'youtu.be/')) {
                    $playlist = explode('youtu.be/', $link['link'])[1];
                    $video_iframe = "<iframe width='460' height='165' src='https://www.youtube.com/embed/$playlist' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                }

                $created_video_link = VideoLink::create([
                    'video_iframe' => $video_iframe,
                    'link' => $link['link']
                ]);
            }
            foreach ($link['title'] as $title_key => $title) {
                if ($title != null) {
                    VideoLinkTranslation::create([
                        'video_link_id' => $created_video_link->id,
                        'language_id' => $title_key,
                        'title' => $title,
                    ]);
                }
            }
        }

        return redirect('press-release-videos');
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

        $validate = [];

        foreach ($request->links as $k => $link) {

            if ($link['link'] != null) {
                $validate["links.$k.title.*"] = 'required';

                if (!str_contains($link['link'], 'youtube.com/watch?v=') && !str_contains($link['link'], 'youtu.be/')) {
                    $validate["links.$k.link"] = 'url';
                }

            }

            foreach ($link['title'] as $p => $title) {

                if ($title != null) {
                    $validate["links.$k.title.*"] = 'required';
                    $validate["links.$k.link"] = 'required';
                }
            }
        }

        $validator = Validator::make($request->all(), $validate);


        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $video_links = VideoLink::all();

        foreach ($video_links as $key => $value) {
            $value->delete();
        }

        foreach ($request->links as $link_key => $link) {
            if ($link['link'] != null) {
                if (str_contains($link['link'], 'youtube.com/watch?v=')) {
                    $pl_list = str_replace('https://www.youtube.com/watch?v=', '', $link['link']);
                    $playlist = explode('&', $pl_list)[0];
                    $video_iframe = "<iframe width='460' height='165' src='https://www.youtube.com/embed/$playlist' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                }
                if (str_contains($link['link'], 'youtu.be/')) {
                    $playlist = explode('youtu.be/', $link['link'])[1];
                    $video_iframe = "<iframe width='460' height='165' src='https://www.youtube.com/embed/$playlist' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                }

                $created_video_link = VideoLink::create([
                    'video_iframe' => $video_iframe,
                    'link' => $link['link']
                ]);
            }
            foreach ($link['title'] as $title_key => $title) {
                if ($title != null) {
                    VideoLinkTranslation::create([
                        'video_link_id' => $created_video_link->id,
                        'language_id' => $title_key,
                        'title' => $title,
                    ]);
                }
            }
        }

        return redirect('press-release-videos');
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
