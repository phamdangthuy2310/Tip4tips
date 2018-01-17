<?php

namespace App\Http\Controllers;

use App\Model\Gift;
use App\Model\GiftCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(Auth::user()->role_id);
        $gifts = DB::table('gifts')
            ->join('giftcategories', 'giftcategories.id', 'gifts.category_id')
        ->select('gifts.*', 'giftcategories.name as category')->get();
        return view('gifts.index', ['gifts' => $gifts] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = GiftCategory::all();
        return view('gifts.create', ['categories' => $categories]);
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
        $gift = $this->validate($request,[
            'name' => 'required'
        ]);
        $gift['description'] = $request->description;
        $gift['thumbnail'] = $request->thumbnail;
        $gift['point'] = $request->point;
        $gift['category_id'] = $request->category;
        Gift::create($gift);

        return redirect('gifts')->with('success', 'Gift created successfully.');
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
        $gift = DB::table('gifts')
        ->join('giftcategories', 'giftcategories.id', 'gifts.category_id')
        ->where('gifts.id', $id)
            ->select('gifts.*', 'giftcategories.name as category')->first();
        return view('gifts.show', compact('gift', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gift = Gift::find($id);
        $categories = GiftCategory::all();
        return view('gifts.edit', compact('gift', 'id'))->with(['categories'=> $categories]);
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
        $gift = Gift::find($id);
        $gift->name = $request->get('name');
        $gift->description = $request->get('description');
        $gift->thumbnail = $request->get('thumbnail');
        $gift->point = $request->get('point');
        $gift->category_id = $request->get('category');
        $gift->save();
        return redirect('gifts')->with('success', 'Gift updated successfully.');
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
        $gift = Gift::find($id);
        $gift->delete();
        return back()->with('success', 'Gift deleted successfully.');
    }
}
