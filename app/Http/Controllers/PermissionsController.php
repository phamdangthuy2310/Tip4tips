<?php

namespace App\Http\Controllers;

use App\Model\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();
        return view('Permissions.index', ['permissions' => $permissions]);
    }

    public function create(){
        return view('permissions.create');
    }
    public function store(Request $request){
        $permission = $this->validate($request, [
            'name',
            'code',
            'menu',
            'function_id'
        ]);
        Permission::create($permission);
        return redirect()->route('permissions.index')->with('success', 'Create Successfully.');
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission', 'id'));
    }

    public function update(Request $request, $id){
        $permission = Permission::find($id);
        $permission->name = $request->get('name');
        $permission->code = $request->get('code');
        $permission->menu = $request->get('menu');
        $permission->function_id = $request->get('function');
        $permission->save();
        return redirect()->route('permissions.index')->with('success', 'Updated successfully');
    }

    public function destroy($id){
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Updated successfully');
    }
}
