<?php

namespace App\Http\Controllers;

use App\Models\CurrentEarthquake;
use App\Models\Feedbacks;
use App\Models\MapRegion;
use App\Models\News;
use App\Models\PressRelease;
use App\Models\RegionalMonitoring;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $press_release = PressRelease::all();
        $current_earthquake = CurrentEarthquake::all();
        $news = News::all();
        $feedback = Feedbacks::all();
        $global_monitoring = MapRegion::all();
        $regional_monitoring = RegionalMonitoring::all();
        return view('home', compact('press_release', 'current_earthquake', 'news', 'feedback', 'global_monitoring', 'regional_monitoring'));
    }
}
