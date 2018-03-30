<?php

namespace App\Http\Controllers;

use App\Common\Common;
use App\Common\Utils;
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
            'username' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fullname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'birthday' => 'required|date',
            'phone' => 'required',
            'region' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user['password']= bcrypt($request->password);
        $user['gender'] = $request->gender;
        $user['phone'] = $request->phone;
        $user['address'] = $request->address;
        $user['point'] = 0;
        $user['vote'] = 0;
        $user['region_id'] = $request->region;
        $user['role_id'] = $request->department;
        $user['delete_is'] = 0;
        $user['reference_lang'] = $request->reference_lang;
        $imageName = 'no_image_available.jpg';
        if(!empty(request()->avatar)){
            $imageName = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('images/upload'), $imageName);
        }

        $user['avatar'] = $imageName;

        User::create($user);
        return redirect()->route('tipsters.index')->with('success', 'Tipster was added successfully.');
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
        $editPoints = true;
        $user = User::getUserByID($id);
        if($roleAuth->code == 'community' || $roleAuth->code == 'admin' ||
            $roletypeAuth->code == 'consultant' || $roleAuth->code == 'ambassador' || $user->id == $auth->id){
            $editAction = true;

        }
        if($roleAuth->code == 'tipster' || $user->id == $auth->id){
            $editPoints = false;
        }
        $roles = Role::getAllRole();
        if($roleAuth->code == 'tipster_normal'){
            $roles = Role::getRoleByCode('tipster_normal');
        }

        $roletypes = RoleType::where('code', 'tipster')->get();
        $regions = Region::all();

        return view('tipsters.edit',compact('user','id'))->with([
            'roles'=>$roles,
            'roletypes' => $roletypes,
            'regions'=> $regions,
            'editAction' => $editAction,
            'editPoints' => $editPoints,
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
        $validator = request()->validate([
            'username' => 'required',
            'email' => 'required',
            'fullname' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = User::find($id);
        $username = $request->get('username');
        if($username != $user->username){
            $countUsername = User::where('username', $username)->count();
            if($countUsername > 0){
                request()->validate([
                    'username' => 'unique:users',
                ]);
            }else{
                $user->username = $username;
            }
        }

        $email = $request->get('email');
        if($email != $user->email){
            $countEmail = User::where('email', $email)->count();
            if($countEmail > 0){
                request()->validate([
                    'email' => 'unique:users',
                ]);
            }else{
                $user->email = $email;
            }
        }

        $user->fullname = $request->get('fullname');
        $user->phone = $request->get('phone');
        $user->birthday = $request->get('birthday');
        $user->address = $request->get('address');
        $user->gender = $request->get('gender');
        $user->role_id = $request->get('department');
        $user->delete_is = $request->get('status');
        $user->point = $request->get('point');
        $user->preferred_lang = $request->get('preferred_lang');
        $imageName = $user->avatar;
        if(!empty(request()->avatar)){
            $imageName = time().'.'.request()->avatar->getClientOriginalExtension();

            request()->avatar->move(public_path('images/upload'), $imageName);
        }
        $user->avatar = $imageName;
        $user->save();
        return redirect()->route('tipsters.index')->with([
            'success' => 'Tipster was updated successfully.',
        ]);
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
        $tipster->delete_is = 1;
        $tipster->save();

        return redirect()->route('tipsters.index')->with('success','Tipster was deleted successfully.');
    }

    public function updatePoint(Request $request){
        $lead_id = $request->lead;
        $tipster_id = $request->tipster;
        $pointnew = $request->point;
        $product_id = Lead::getLeadByID($lead_id)->product_id;
        //Add points, tipster, lead to point_histories
        $history['lead_id'] = $lead_id;
        $history['tipster_id'] = $tipster_id;
        $history['point'] = $pointnew;
        PointHistory::create($history);

        //Update points to Tipster
        $tipster = User::find($tipster_id);
        $tipster->point = $tipster->point + $pointnew;
        $tipster->save();
        $win = Utils::$lead_process_status_win;
        Common::sendMailChangeStatus($win,$tipster_id, $lead_id, $product_id, $pointnew);
        return redirect()->route('tipsters.index');
    }

    public function updatePointAjax(Request $request){
        //get info of ajax
        $lead_id = $request->lead;
        $tipster_id = $request->tipster;
        $newpoint = $request->point;
        $lead = Lead::getLeadByID($lead_id);
        $product_id = $lead->product_id;
        $ups = 'ups';
        $pps = 'pps';
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
                /*----------------------------------------------------
                 * Send email to tipster to notify update points
                 * ---------------------------------------------------*/
                Common::sendMailChangeStatus($ups,$tipster_id, $lead_id, $product_id, $newpoint);

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

                $success = 'Added points successfully.';
                $response["status"] = "0";
                $response["success"] = $success;
                /*----------------------------------------------------
                 * Send email to tipster to notify plus points
                 * ---------------------------------------------------*/
                Common::sendMailChangeStatus($pps,$tipster_id, $lead_id, $product_id, $newpoint);
            }

        }catch(Exception $e){
            $response['error'] = $e->getMessage();
            $response["status"] = "-2";
        }

        return response()->json($response);
    }

    public function updatePointSendMail(Request $request, $id){
        $tipster = User::getUserByID($id);
        $actionType = $request->actionType;
        $pointsNew = $request->pointsUpdate;
        $action = $request->action;
        $comment = $request->comment;
        if($actionType === 'plus'){
            $tipster->point = $tipster->point + $pointsNew;
        }elseif ($actionType === 'minus'){
            $tipster->point = $tipster->point - $pointsNew;
        }
        $tipster->save();
        return redirect()->route('tipsters.edit', $id)->with('success', 'Update points of tipster successfully.');
    }
}
