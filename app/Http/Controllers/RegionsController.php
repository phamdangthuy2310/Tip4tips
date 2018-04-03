<?php

namespace App\Http\Controllers;

use App\Model\Region;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $regions = Region::getAllRegion();
        return view('regions.index', compact('regions', $regions));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('regions.create');
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
        $validate = $this->validate(request(),[
            'name' => 'required|unique:regions',
            'code' => 'required|unique:regions',
        ]);
        $region['name'] = $request->name;
        $region['code'] = $request->code;
        Region::create($region);
        return redirect()->route('regions.index')->with('success', 'Created region successfully.');
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
        $region = Region::find($id);
        return view('regions.show', compact('region', $region));
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
        $region = Region::find($id);
        return view('regions.edit', compact('region', $region));
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
        $validate = $this->validate(request(),[
            'name' => 'required|unique:regions',
            'code' => 'required|unique:regions',
        ]);
        $region = Region::find($id);
        $region->name = $region->get('name');
        $region->code = $region->get('code');
        $region->save();
        return redirect()->route('regions.index')->with('success', 'Update region successfully.');
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
