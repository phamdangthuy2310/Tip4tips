<?php

namespace App\Http\Controllers;

use App\Model\Region;
use App\Model\Role;
use App\Model\RoleType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;
        $users = User::getAllConsultant();
        if($roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
            $users = User::getAllUserNotTipster();
        }
        if($roleAuth->code == 'sale'){
            $editAction = true;
            $createAction = true;
            $deleteAction = true;
        }

        return view('users.index', [
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
        $roles = Role::all();
        $regions = Region::all();
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $createAction = false;
        $roletypes = RoleType::where('code', '<>', 'tipster')->get();
        if($roleAuth->code == 'admin' || $roleAuth->code == 'sale'){
            $createAction = true;
        }
        if($roleAuth->code == 'sale'){
            $roletypes = RoleType::where('code', 'consultant')->get();
        }
        return view('users.create')->with([
            'roles' => $roles,
            'roletypes' => $roletypes,
            'regions'=> $regions,
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
        $user = $this->validate(request(),[
            'username' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'fullname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'birthday' => 'required|date',
        ]);
        $user['username'] = $request->username;
        $user['fullname'] = $request->fullname;
        $user['birthday'] = $request->birthday;
        $user['email'] = $request->email;
        $user['password']= bcrypt($request->password);
        $user['gender'] = $request->gender;
        $user['phone'] = $request->phone;
        $user['address'] = $request->address;
        $user['avatar'] = $request->avatar;
        $user['point'] = 0;
        $user['vote'] = 0;
        $user['region_id'] = $request->region;
        $user['role_id'] = $request->department;
        $user['delete_is'] = 1;
        User::create($user);
        return redirect('users')->with('success', 'User added successfully.');
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
        $roletype = RoleType::find($role->roletype_id);
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $flag = true;
        return view('users.show', compact('user', 'id'))->with([
            'role' => $role,
            'roletype'=> $roletype,
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
        $user = User::find($id);
        $roles = Role::all();
        $roletypes = RoleType::where('code', '<>', 'tipster')->get();
        $regions = Region::all();

        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;

        if($roleAuth->code == 'admin' || $roleAuth->code == 'sale'){
            $editAction = true;
        }
        if($roleAuth->code == 'sale'){
            $roletypes = RoleType::where('code', 'consultant')->get();
        }
        return view('users.edit',compact('user','id'))->with([
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
        $user = User::find($id);
        $user->fullname = $request->get('fullname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->gender = $request->get('gender');
        $user->role_id = $request->get('department');
        $user->delete_is = $request->get('status');
        $user->avatar = $request->get('avatar');

        $user->save();
        return redirect('users')->with('success','Users has been updated');
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
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);

        $user = User::find($id);
        if($roletypeAuth->code == 'tipster' || $roletypeAuth->code == 'consultant'){
            return back()->with('error', 'You do not have access delete user.');
        }else{
            if($roleAuth->code == 'sale'){
                if(RoleType::getNameByID(Role::getInfoRoleByID($user->role_id)->roletype_id)->code == 'consultant'){
                    $user->delete_is = 0;
                    $user->save();
                    return back()->with('success', 'Delete a user successfully.');
                } else{
                    return back()->with('error', 'You do not have access delete user.');
                }
            }elseif($roleAuth->code == 'community'){
                if(Role::getInfoRoleByID($user->id) == 'tipster'){
                    $user->delete_is = 0;
                    $user->save();
                    return back()->with('success', 'Delete a user successfully.');
                }else{
                    return back()->with('error', 'You do not have access delete user.');
                }
            }else{
                $user->delete_is = 0;
                $user->save();
                return back()->with('success', 'Delete a user successfully.');
            }
        }
    }
}
