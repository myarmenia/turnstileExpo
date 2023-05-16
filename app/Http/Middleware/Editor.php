<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $data = null;
        $params = $request->route()->parameters();
        $route = explode('.', request()->route()->getName())[0];

        foreach ($params as $key => $value) {
            $data = DB::table($request->table)->where(['id' => $value, 'editor_id' => Auth::id()])->first();
        }

        if($data != null || Auth::user()->isAdmin()){
            return $next($request);
        }
        else{
            return redirect($route)->with('permission_denied', 'You dont have  permission to edit.');
        }

    }
}
