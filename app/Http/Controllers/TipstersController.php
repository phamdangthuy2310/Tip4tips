<?php

namespace App\Http\Controllers;

use App\Common\Common;
use App\Model\Lead;
use App\Model\PointHistory;
use App\Model\Product;
use App\Model\Region;
use App\Model\Role;
use App\Model\RoleType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class TipstersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::getAllTipster();

        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;

        if($roleAuth->code == 'community' || $roleAuth->code == 'admin' || $roleAuth->code == 'ambassador'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
        }

        if($roletypeAuth->code == 'consultant'){
            $editAction = true;
        }

        return view('tipsters.index', [
            'users' => $users,
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
        if($roleAuth->code == 'community' || $roleAuth->code == 'admin' || $roleAuth->code == 'ambassador'){
            $createAction = true;
        }

        $roles = Role::all();
        $roletypes = RoleType::where('code', 'tipster')->get();
        $regions = Region::all();
        return view('tipsters.create')->with([
            'roles' => $roles,
            'roletypes' => $roletypes,
            'regions'=> $regions,
            'createAction' =>$createAction
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
        $user = $this->validate(request(),[
            'username' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'fullname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'birthday' => 'required|date',
            'phone' => 'required',
            'region_id' => 'required',
        ]);
        $user['password']= bcrypt($request->password);
        $user['gender'] = $request->gender;
        $user['phone'] = $request->phone;
        $user['address'] = $request->address;
        $user['point'] = 0;
        $user['vote'] = 0;
        $user['region_id'] = $request->region;
        $user['role_id'] = $request->department;
        $user['delete_is'] = 1;
        $user['avatar'] = $request->avatar;
        User::create($user);
        return redirect('tipsters')->with('success', 'Tipster added successfully.');
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
        $user = User::find($id);
        $role = Role::find($user->role_id);
        $auth = Auth::user();
        $roletype = RoleType::find($role->roletype_id);
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $deleteAction = false;
        $editAction = false;

        //get list lead belong tipster
        $leads = Lead::getAllLeadBelongTipster($id);
        foreach ($leads as $lead){
            $lead->statusLead = Common::showNameStatus($lead->status);
            $lead->create = Common::dateFormat($lead->created_at);
            $lead->product = Product::getProductByID($lead->product_id)->name;
            $point = PointHistory::getPointByTipsterIDLeadID($id, $lead->id);
            if(!empty($point)){
                $lead->point = $point->point;
            }else{
                $lead->point = 0;
            }

        }

        if($roleAuth->code == 'community' || $roleAuth->code == 'admin' || $roleAuth->code == 'ambassador' || $roletypeAuth->code == 'consultant'){
            $deleteAction = true;
            $editAction = true;
        }
        if($user->id == $auth->id){
            $editAction = true;
        }
        return view('tipsters.show', compact('user', 'id'))->with([
            'role' => $role,
            'roletype' => $roletype,
            'deleteAction' => $deleteAction,
            'editAction' => $editAction,
            'leads' =>$leads,
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
        if($roleAuth->code == 'community' || $roleAuth->code == 'admin' ||
            $roletypeAuth->code == 'consultant' || $roleAuth->code == 'ambassador'){
            $editAction = true;
        }

        $user = User::find($id);
        $roles = Role::all();
        $roletypes = RoleType::where('code', 'tipster')->get();
        $regions = Region::all();
        return view('tipsters.edit',compact('user','id'))->with([
            'roles'=>$roles,
            'roletypes' => $roletypes,
            'regions'=> $regions,
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
        //
        $user = User::find($id);
        $user->fullname = $request->get('fullname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->birthday = $request->get('birthday');
        $user->address = $request->get('address');
        $user->gender = $request->get('gender');
        $user->role_id = $request->get('department');
        $user->delete_is = $request->get('status');
        $user->point = $request->get('point');
        $user->avatar = $request->get('avatar');

        $user->save();
        return redirect('tipsters')->with('success','Users has been updated');
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
        $tipster = User::find($id);
        $tipster->delete();

        return redirect('tipsters')->with('success','Deleted successfully.');
    }

    public function updatePoint(Request $request){
        $pointnew = $request->point;
        //Add points, tipster, lead to point_histories
        $history['lead_id'] = $request->lead;
        $history['tipster_id'] = $request->tipster;
        $history['point'] = $pointnew;
        PointHistory::create($history);

        //Update points to Tipster
        $tipster = User::find($request->tipster);
        $tipster->point = $tipster->point + $pointnew;
        $tipster->save();
        return redirect('tipsters');
    }

    public function updatePointAjax(Request $request){
        //get info of ajax
        $lead_id = $request->lead;
        $tipster_id = $request->tipster;
        $newpoint = $request->point;
        $response = array();
        try{
            /*Check point plussed for this tipster from lead?*/
            $countRowPlus = count(PointHistory::countRowPlusPointForTipsterFollowLead($lead_id, $tipster_id));

            if($countRowPlus > 0){ /*If tipster was plussed point*/
                $warning = "This tipster was updated the point successfully.";
                $response["warning"] = $warning;
                $response["status"] = "-1";

                $historyUpdate = PointHistory::where([
                    ['lead_id', $lead_id],
                    ['tipster_id', $tipster_id]
                ])->first();
                $oldPoint = $historyUpdate->point;
                $historyUpdate['point'] = $newpoint;
                $historyUpdate->save();

                /*Update point for tipster*/
                $tipster = User::find($tipster_id);
                $tipster['point'] = $tipster['point'] - $oldPoint + $newpoint;
                $tipster->save();

            }else{/*If tipster do not plussed point yet.*/
                //Add points, tipster, lead to point_histories table
                $history['lead_id'] = $lead_id;
                $history['tipster_id'] = $tipster_id;
                $history['point'] = $newpoint;
                PointHistory::create($history);

                //Update points to Tipster
                $tipster = User::find($tipster_id);
                $tipster->point = $tipster->point + $newpoint;
                $tipster->save();

                $success = 'Plussed successfully.';
                $response["status"] = "0";
                $response["success"] = $success;
            }

        }catch(Exception $e){
            $response['error'] = $e->getMessage();
            $response["status"] = "-2";
        }

        return response()->json($response);
    }
}
