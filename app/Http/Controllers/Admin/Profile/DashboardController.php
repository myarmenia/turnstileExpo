<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Admin']);
    }

    public function index(){

        return view('admin.profile.dashboard');

    }

}
