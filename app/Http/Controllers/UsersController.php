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

//        dd($role->code);
        $flag = true;
        if($roletypeAuth->code == 'tipster' || $roletypeAuth->code == 'consultant'){
            $flag = false;
            $alert = "You do not have access to this screen";
            return view('users.index', ['alert' => $alert, 'flag' => $flag]);
        }else{
            if($roleAuth->code == 'sale'){
                $users = DB::table('users')
                    ->join('roles', 'users.role_id', 'roles.id')
                    ->join('roletypes', 'roles.roletype_id', 'roletypes.id')
                    ->where('roletypes.code', 'consultant')
                    ->orWhere('roletypes.code', 'tipster')
                    ->select('users.*', 'roles.name as role', 'roletypes.name as roletype')
                    ->get();

            }elseif($roleAuth->code == 'community'){
                $users = DB::table('users')
                    ->join('roles', 'users.role_id', 'roles.id')
                    ->join('roletypes', 'roles.roletype_id', 'roletypes.id')
                    ->where('roletypes.code', 'tipster')
                    ->orWhere('roletypes.code', 'consultant')
                    ->select('users.*', 'roles.name as role', 'roletypes.name as roletype')
                    ->get();
            }else{
                $users = DB::table('users')
                    ->join('roles', 'users.role_id', 'roles.id')
                    ->join('roletypes', 'roles.roletype_id', 'roletypes.id')
                    ->where('roletypes.code', '<>', 'tipster')
                    ->select('users.*', 'roles.name as role', 'roletypes.name as roletype')
                    ->get();
            }
            return view('users.index', ['users' => $users, 'flag' => $flag]);
        }


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
        $flag = true;
        if($roletypeAuth->code == 'tipster' || $roletypeAuth->code == 'consultant'){
            $flag = false;
            $alert = "You do not have access to this screen";
            return view('users.create')->with(['alert' => $alert, 'flag' => $flag]);
        }else{
            if($roleAuth->code == 'sale'){
                $roletypes = RoleType::where('code', 'consultant')->get();

            }elseif($roleAuth->code == 'community'){
                $roletypes = RoleType::where('code', 'tipster')->get();
            }else{
                $roletypes = RoleType::where('code', '<>', 'tipster');
            }
        }
        return view('users.create')->with(['roles' => $roles, 'roletypes' => $roletypes, 'regions'=> $regions, 'flag' => $flag]);
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
        $user['password']= bcrypt($request->password);
        $user['gender'] = $request->gender;
        $user['phone'] = $request->phone;
        $user['address'] = $request->address;
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
        if($roletypeAuth->code == 'tipster' || $roletypeAuth->code == 'consultant'){
            $flag = false;
            $alert = "You do not have access to this screen";
            return view('users.show', compact('user', 'id'))->with(['alert' => $alert, 'flag' => $flag]);
        }else{
            return view('users.show', compact('user', 'id'))->with(['role' => $role, 'roletype'=> $roletype, 'flag' => $flag]);
        }

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
        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);

        if($roletypeAuth->code == 'tipster' || $roletypeAuth->code == 'consultant'){
            return back()->with('error', 'You do not have access delete user.');
        }else{
            if($roleAuth->code == 'sale'){
                if(RoleType::getNameByID(Role::getInfoRoleByID($user->role_id)->roletype_id)->code == 'consultant'){
                    return view('users.edit',compact('user','id'))->with(['roles'=>$roles, 'roletypes' => $roletypes, 'regions'=> $regions]);
                }else{
                    return back()->with('You do not have access this screen.');
                }
            }elseif ($roleAuth->code == 'community'){
                if(RoleType::getNameByID(Role::getInfoRoleByID($user->role_id)->roletype_id)->code == 'tipster'){
                    return view('users.edit',compact('user','id'))->with(['roles'=>$roles, 'roletypes' => $roletypes, 'regions'=> $regions]);
                }else{
                    return back()->with('You do not have access this screen.');
                }
            }else{
                return view('users.edit',compact('user','id'))->with(['roles'=>$roles, 'roletypes' => $roletypes, 'regions'=> $regions]);
            }
        }
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
