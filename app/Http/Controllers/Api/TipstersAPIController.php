<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipstersAPIController extends Controller
{
    /*===========================================================================
     * CONTROLLER FOR API
     * ==========================================================================*/
    public function index(){
        $tipsters = User::getAllTipster();

        return $tipsters;
    }

    public function show(User $id){
        return $id;
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'username' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fullname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'birthday' => 'required|date',
            'phone' => 'required',
            'region' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $tipster = User::create($request->all());

        return response()->json($tipster, 201);
    }

    public function update(Request $request, User $tipster)
    {
        $this->validate($request,[
            'username' => 'required',
            'email' => 'required',
            'fullname' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $tipster->update($request->all());

        return response()->json($tipster, 200);
    }

    public function delete(User $tipster)
    {
        $tipster->delete();

        return response()->json(null, 204);
    }
}
