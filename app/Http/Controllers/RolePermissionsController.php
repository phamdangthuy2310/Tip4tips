<?php

namespace App\Http\Controllers;

use App\Model\Permission;
use Illuminate\Http\Request;

class RolePermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rolepermissions = Permission::all();
        return view('rolepermissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rolepermissions.create');
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
        $rolepermiss['role_id'] = $request->role;
        $rolepermiss['permission_id'] = $request->permission;
        Permission::create($rolepermiss);
        return redirect()->route('rolepermissions.index')->with('success', 'Created Successfully.');
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
        return view('rolepermissions.edit');
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
        //
        $rolepermiss = Permission::find($id);
        $rolepermiss->role_id = $request->get('role');
        $rolepermiss->permission_id = $request->get('permission');
        $rolepermiss->save();
        return redirect()->route('rolepermissions.index')->with('success', 'Updated successfully');
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
        $rolepermiss = Permission::find($id);
        $rolepermiss->delete();
        return redirect()->route('rolepermissions.index')->with('success', 'Deleted Successfully');
    }
}
