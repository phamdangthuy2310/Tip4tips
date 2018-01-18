<?php

namespace App\Http\Controllers;

use App\Model\Assignment;
use App\Model\Lead;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assignments = Assignment::all();
//        $assignments = DB::table('assignments')
//        ->join('users', 'users.id', 'assignments.consultant_id')
//        ->join('leads', 'users.lead_id', 'leads.id')
//        ->select('assignments.*','users.username as consultant', 'leads.fullname as lead');
//        $assigners = DB::table('assignments')
//            ->join('users', 'users.id', 'assignments.consultant_id')
//        ->get();
        return view('assignments.index', ['assignments'=>$assignments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $consultants = User::getAllConsultant();

        $leads = Lead::getAllLeadNotYetAssign();

//        print_r($consultants);die();
        return view('assignments.create',
            [
                'consultants'=>$consultants,
                'leads' => $leads
            ])
            ->with('success', 'Assignment successfully.');
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
        $user =  Auth::user();
        $assignment['consultant_id'] = $request->get('consultant');
        $assignment['lead_id'] = $request->get('lead');
        $assignment['create_by'] = Auth::user()->id;
        Assignment::create($assignment);
        return redirect('assignments')->with('success', 'Assignment successfully.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultants = User::getAllConsultant();

        $leads = Lead::getAllLeadNotYetAssign();
        $assignment = Assignment::find($id);

        return  view('assignments.edit', compact('assignment', 'id'))->with([
            'consultants'=>$consultants,
            'leads' => $leads
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
        $user =  Auth::user();
        $assignment = Assignment::find($id);
        $assignment->consultant_id = $request->get('consultant');
        $assignment->lead_id = $request->get('lead');
        $assignment->create_by = Auth::user()->id;
        $assignment->save();
        return redirect('assignments')->with('success', 'Updated successfully');
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
        $ass = Assignment::find($id);
        $ass->delete();
        return redirect('assignments')->with('success', 'Delete Successfully.');
    }
}
