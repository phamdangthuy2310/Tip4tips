<?php

namespace App\Http\Controllers;

use App\Model\Lead;
use App\Model\Region;
use App\Model\Role;
use App\Model\RoleType;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
        }
        if($roletypeAuth->code == 'consultant'){
            $editAction = true;
            $deleteAction = true;
        }
        if($roletypeAuth->code == 'tipster'){
            $editAction = true;
            $createAction = true;
        }
        return view('leads.index', [
            'leads' => $leads,
            'editAction' => $editAction,
            'deleteAction' => $deleteAction,
            'createAction' => $createAction
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin' || $roletypeAuth == 'tipster'){
            $createAction = true;
        }

        $tipsters = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roletypes.id', 'roles.roletype_id')
            ->select('users.*', 'roles.name', 'roletypes.code')
            ->where('roletypes.code','tipster')
            ->get();
        $regions = Region::all();
        return view('leads.create', [
            'tipsters' => $tipsters,
            'regions' => $regions,
            'createAction' => $createAction
        ]);
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
            'fullname' => 'required'
        ]);
        $lead['fullname'] = $request->fullname;
        $lead['email'] = $request->email;
        $lead['birthday'] = $request->birthday;
        $lead['gender'] = $request->gender;
        $lead['phone'] = $request->phone;
        $lead['address'] = $request->address;
        $lead['product_id'] = $request->product;
        $lead['status'] = 0;
        $lead['region_id'] = $request->region;
        $lead['tipster_id'] = $request->tipster;
        Lead::create($lead);

        return redirect('leads')->with('success', 'Lead has been added');
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
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $editAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin' || $roletypeAuth == 'tipster'|| $roletypeAuth == 'consultant'){
            $editAction = true;
        }

        $lead = Lead::find($id);
        $regions = Region::all();
        $tipsters = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roletypes.id', 'roles.roletype_id')
            ->select('users.*', 'roles.name', 'roletypes.code')
            ->where('roletypes.code','tipster')
            ->get();
        return view('leads.edit', compact('lead', 'id'))->with([
            'regions'=> $regions,
            'tipsters'=>$tipsters,
            'editAction' => $editAction
        ]);
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
        $lead->product_id = $request->get('product');
        $lead->tipster_id = $request->get('tipster');
        $lead->region_id = $request->get('region');
        $lead->status = $request->get('status');
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
        return back()->with('success', 'Lead deleted successfully.');
    }
}
