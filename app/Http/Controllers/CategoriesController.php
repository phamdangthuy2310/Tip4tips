<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($catetype)
    {
        //
        if($catetype == 'gifts'){
            $categories = Category::where('belong', 1)->get();
        }elseif ($catetype == 'products'){
            $categories = Category::where('belong', 0)->get();
        }else{
            $categories = Category::all();
        }

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($catetype)
    {
        //
        return view('categories.create', ['catetype' => $catetype]);
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
            'name' => 'required'
        ]);
        $category['description'] = $request->description;
        if($request->belong == 'products'){
            $belong = 0;
        }else{
            $belong =1;
        }
        $category['belong'] = $belong;
        Category::create($category);

        return redirect('categories/'.$request->belong)->with('success', 'Category was added successfully.');
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
        $category = Category::find($id);
        $category->delete();
        return back()->with('success', 'Delete Successfully.');
    }
}
