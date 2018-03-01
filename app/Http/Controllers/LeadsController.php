<?php

namespace App\Http\Controllers;

use App\Model\Lead;
use App\Model\LeadProcess;
use App\Model\PointHistory;
use App\Model\Product;
use App\Model\Region;
use App\Model\Role;
use App\Model\RoleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\Common\Common;
use App\User;

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
        $leads= Lead::getAllLead();
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
            'fullname' => 'required',
            'product' => 'required',
            'region' => 'required',
            'tipster' => 'required'
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

        $lead = Lead::getLeadByID($id);

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

        $lead = Lead::getLeadByID($id);
        $products = Product::getAllProduct();
        $rowPoint = PointHistory::countRowPlusPointForTipsterFollowLead(
            $lead->id,
            $lead->tipster_id
        );
//        dd($rowPoint);
        $oldPoint = 0;
        $plussed = false;
        if(!empty($rowPoint)){
            $oldPoint = $rowPoint->point;
            $plussed = true;
        }
        $regions = Region::all();
        $tipsters = DB::table('users')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('roletypes', 'roletypes.id', 'roles.roletype_id')
            ->select('users.*', 'roles.name', 'roletypes.code')
            ->where('roletypes.code','tipster')
            ->get();
        $consultants = User::getAllConsultant();
        return view('leads.edit', compact('lead', 'id'))->with([
            'products'=> $products,
            'regions'=> $regions,
            'tipsters'=>$tipsters,
            'editAction' => $editAction,
            'plussed' => $plussed,
            'oldPoint' => $oldPoint,
            'consultants' => $consultants
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
        //
        $lead = $request->lead;
        $status = $request->status;
        $response = array();
        try{
            $result = count(LeadProcess::checkExist($lead, $status));
            $leadTable = Lead::find($lead);
            if($result < 1){
                $statusDb = $leadTable->status;
                $response['status_db'] = $statusDb;
                $response['status_view'] = $status;
                if($statusDb != $status){
                    $process['lead_id'] = $lead;
                    $process['status_id'] = $status;
                    LeadProcess::create($process);
                    $leadTable->status = $status;
                    $leadTable->save();
                    //get all history
                    $newHistoryProcess = LeadProcess::getStatusByLead($lead)->first();
                    $newHistoryProcess->created_format = Common::dateFormat($newHistoryProcess->created_at,'d-M-Y H:i');
                    $newHistoryProcess->classStatus = Lead::showColorStatus($status);
                    $newHistoryProcess->nameStatus = Lead::showNameStatus($status);

                    $response["newHistoryProcess"] = $newHistoryProcess;
                    $message= "Update successfully";
                    $response["status"] = "0";
                    $response["message"] = $message;
                }else{
                    $error = "Current status was picked. Please pick another.";
                    $response["error"] = $error;
                    $response["status"] = "-1";
                    BaseController::rollbackLogActiviteis($request);
                }
            }else{
                $error = "Current status was picked. Please pick another.";
                $response["error"] = $error;
                $response["status"] = "-1";
                BaseController::rollbackLogActiviteis($request);
            }

//            $result = count(LeadProcess::checkExist($lead, $status));
//            if($result > 0){
//                $error = "Current status was picked. Please pick another.";
//                $response["error"] = $error;
//                $response["status"] = "-1";
//            }else{
//                $process['lead_id'] = $lead;
//                $process['status_id'] = $status;
//                LeadProcess::create($process);
//                $lead = Lead::find($lead);
//                $lead->status = $status;
//                $lead->save();
//                $message= "Update successfully";
//                $response["status"] = "0";
//                $response["message"] = $message;
//            }
        }catch (\Exception $e) {
            BaseController::rollbackLogActiviteis($request);
            $response['error'] = $e->getMessage();
            $response["status"] = "-2";
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
