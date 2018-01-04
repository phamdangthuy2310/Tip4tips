<?php

namespace App\Http\Controllers;

use App\Model\Lead;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leads= Lead::all();
        return view('leads.index', ['leads' => $leads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('leads.create');
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
        $lead = $this->validate(request(),[
            'fullname' => 'required',
            'email' => 'email',
            'birthday' => 'required|date',
        ]);
        $lead['gender'] = $request->gender;
        $lead['phone'] = $request->phone;
        $lead['address'] = $request->address;
        $lead['region_id'] = $request->region;
//        $user['tipster_id'] = $request->tipster;
        $lead['delete_is'] = 1;
        Lead::create($lead);

        return back()->with('success', 'Lead has been added');
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
        //
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
