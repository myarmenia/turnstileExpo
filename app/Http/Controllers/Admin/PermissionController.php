<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id','DESC')->paginate(5); //Get all permissions

        return view('admin.permissions.index', compact('permissions'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('admin.permissions.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40|unique:permissions,name',
        ]);

        $name = $request['name'];
        $guard_name= 'web';
        $permission = new Permission();
        $permission->name = $name;
        $permission->guard_name = $guard_name;


        $permission->save();


        return redirect()->route('admin.permissions.index')
            ->with('flash_message',
             'Permission'. $permission->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));
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

        $permission = ModelsPermission::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:40|unique:permissions,name',
        ]);

        if($permission->roles->count() == 0 && $permission->users->count() == 0){
            $input = $request->all();
            $permission->fill($input)->save();

            return redirect()->route('admin.permissions.index')
                ->with('flash_message',
                'Permission'. $permission->name.' updated!');
        }
        else{
            return 'can not change';
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
        $permission = ModelsPermission::findOrFail($id);

        if($permission->roles->count() == 0 && $permission->users->count() == 0){
            $deleted = $permission->delete();
            if($deleted){
                return redirect()->back();
            }
        }
        else{
            return 'can not delet';
        }

    }
}
