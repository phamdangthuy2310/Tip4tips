<?php

namespace App\Http\Controllers;

use App\Model\GiftCategory;
use Illuminate\Http\Request;

class GiftCategoriesController extends Controller
{
    //
    public function index()
    {
        $categories = GiftCategory::all();
        return view('giftcategories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('giftcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->validate($request,[
            'name' => 'required',
        ]);
        $category['name'] = $request->name;
        $category['code'] = strtolower(preg_replace('/\s*/', '', $request->code));
        $category['description'] = $request->description;


        GiftCategory::create($category);

        return redirect()->route('giftcategories.index')->with('success', 'Category was added successfully.');
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
        //
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
        $category = GiftCategory::find($id);
        $category->delete();
        return back()->with('success', 'Deleted Successfully.');
    }
}
