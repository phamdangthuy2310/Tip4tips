<?php

namespace App\Http\Controllers\Api;

use App\Model\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadsAPIController extends Controller
{
    /*===========================================================================
      * CONTROLLER FOR API
      * ==========================================================================*/
    public function index(){
        $leads = Lead::getAllLead();

        return $leads;
    }

    public function show(Lead $id){
        return $id;
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'Leadname' => 'required|unique:Leads',
            'password' => 'required|string|min:6|confirmed',
            'fullname' => 'required',
            'email' => 'required|string|email|max:255|unique:Leads',
            'birthday' => 'required|date',
            'phone' => 'required',
            'region' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $lead = Lead::create($request->all());

        return response()->json($lead, 201);
    }

    public function update(Request $request, Lead $lead)
    {
        $this->validate($request,[
            'fullname' => 'required',
            'product' => 'required',
            'region' => 'required',
            'tipster' => 'required'
        ]);
        $lead->update($request->all());

        return response()->json($lead, 200);
    }

    public function delete(Lead $lead)
    {
        $lead->delete();

        return response()->json(null, 204);
    }
}
