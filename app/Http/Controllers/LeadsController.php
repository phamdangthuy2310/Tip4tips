<?php

namespace App\Http\Controllers;

use App\Model\Lead;
use App\Model\Region;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $tipsters = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roletypes.id', 'roles.roletype_id')
            ->select('users.*', 'roles.name', 'roletypes.code')
            ->where('roletypes.code','tipster')
            ->get();
        $regions = Region::all();
        return view('leads.create', ['tipsters' => $tipsters, 'regions' => $regions]);
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
            'email' => 'required|email',
            'birthday' => 'required|date',
        ]);
        $lead['gender'] = $request->gender;
        $lead['phone'] = $request->phone;
        $lead['address'] = $request->address;
        $lead['need'] = $request->need;
        $lead['region_id'] = $request->region;
        $lead['tipster_id'] = $request->tipster;
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
//        $lead = Lead::find($id);
        $lead = DB::table('leads')
            ->join('regions', 'regions.id', 'leads.region_id')
        ->select('leads.*', 'regions.name as region')
        ->first();
//        print_r($lead);die();
        return view('leads.show', compact('lead', 'id'));
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
        $lead = Lead::find($id);
        $regions = Region::all();
        $tipsters = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roletypes.id', 'roles.roletype_id')
            ->select('users.*', 'roles.name', 'roletypes.code')
            ->where('roletypes.code','tipster')
            ->get();
        return view('leads.edit', compact('lead', 'id'))->with(['regions'=> $regions, 'tipsters'=>$tipsters]);
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
        $lead = Lead::find($id);
        $lead->fullname = $request->get('fullname');
        $lead->email = $request->get('email');
        $lead->phone = $request->get('phone');
        $lead->address = $request->get('address');
        $lead->gender = $request->get('gender');
        $lead->need = $request->get('need');
        $lead->tipster_id = $request->get('tipster');
        $lead->region_id = $request->get('region');
        $lead->save();
        return redirect('leads')->with('success','Leads has been updated');
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
        $lead = Lead::find($id);
        $lead->delete();
        return redirect('leads')->with('success', 'Lead deleted successfully.');
    }
}
