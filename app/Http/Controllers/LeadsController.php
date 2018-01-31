<?php

namespace App\Http\Controllers;

use App\Model\Lead;
use App\Model\LeadProcess;
use App\Model\Region;
use App\Model\Role;
use App\Model\RoleType;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

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
        $leads= Lead::select('*')->orderBy('created_at', 'desc')->get();
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
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin' || $roletypeAuth->code == 'tipster'){
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
        $lead['notes'] = $request->notes;
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
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $deleteAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin' || $roletypeAuth->code == 'consultant' || $roletypeAuth->code == 'tipster'){
            $deleteAction = true;
        }

        $lead = Lead::find($id);

        return view('leads.show', compact('lead', 'id'))->with([
            'deleteAction' => $deleteAction
        ]);
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
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin' || $roletypeAuth->code == 'tipster'|| $roletypeAuth->code == 'consultant'){
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
        $lead->notes = $request->get('notes');
        $lead->tipster_id = $request->get('tipster');
        $lead->region_id = $request->get('region');
//        $lead->status = $request->get('status');
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

    public function ajaxStatus(Request $request){
        $response = array(
            'status' => $request->status,
            'msg' => 'Setting created successfully',
        );
        try{
            $status['lead_id'] = $request->lead;
            $status['status_id'] = $request->status;
            $lead = Lead::find($request->lead);
            $lead['status'] = $request->status;
            $lead->save();
            LeadProcess::create($status);
        }catch (\Exception $e) {
            $response['error'] = $e->getMessage();
        }
        return response()->json($response);
    }

    public function updateStatus(Request $request){
        $lead = $request->lead;
        $status = $request->status;

        $result = count(LeadProcess::checkExist($lead, $status));
        if($result > 0){
            $error = "Current status was picked. Please pick another.";
            return back()->with(['error', $error]);
        }else{
            $process['lead_id'] = $lead;
            $process['status_id'] = $status;
            LeadProcess::create($process);
            $lead = Lead::find($lead);
            $lead->status = $status;
            $lead->save();
            return back()->with(['success', 'Update successfully']);
        }
    }

    public function updateTipster(Request $request){
        $tipster = $request->tipster;
        $lead = Lead::find($request->lead);
        $lead->tipster_id = $tipster;
        $lead->save();
        return back()->with('Update tipster successfully.');
    }
}
