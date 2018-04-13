<?php

namespace App\Http\Controllers;

use App\Model\Gift;
use App\Model\GiftCategory;
use App\Model\Role;
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
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;
        if($roleAuth->code == 'community' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
        }
        $gifts = DB::table('gifts')
            ->join('giftcategories', 'giftcategories.id', 'gifts.category_id')
            ->select('gifts.*', 'giftcategories.name as category')
            ->where('gifts.delete_is', '<>', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('gifts.index', [
            'gifts' => $gifts,
            'editAction' => $editAction,
            'deleteAction' => $deleteAction,
            'createAction' => $createAction
        ] );
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
        $createAction = false;
        if($roleAuth->code == 'community' || $roleAuth->code == 'admin'){
            $createAction = true;
        }
        $categories = GiftCategory::all();
        return view('gifts.create', ['categories' => $categories, 'createAction' => $createAction]);
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
            'name' => 'required',
            'point' => 'integer|min:0',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8112'
        ]);
        $gift['description'] = $request->description;
        $imageName = 'no_image_available.jpg';
        if(!empty(request()->thumbnail)){
            $imageName = time().'.'.request()->thumbnail->getClientOriginalExtension();
            request()->thumbnail->move(public_path('images/upload'), $imageName);
        }
        $gift['thumbnail'] = $imageName;
        $point = $request->point;
        if(empty($point)){
            $point = 0;
        }
        $gift['point'] = $point;
        $gift['category_id'] = $request->category;
        Gift::create($gift);

        return redirect()->route('gifts.index')->with('success', 'Gift was created successfully.');
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
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;
        $deleteAction = false;
        if($roleAuth->code == 'community' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
        }
        $gift = DB::table('gifts')
        ->join('giftcategories', 'giftcategories.id', 'gifts.category_id')
        ->where('gifts.id', $id)
            ->select('gifts.*', 'giftcategories.name as category')->first();
        return view('gifts.show', compact('gift', 'id'))
            ->with([
                'editAction' => $editAction,
                'deleteAction' => $deleteAction
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
        $gift = Gift::find($id);
        $categories = GiftCategory::all();
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $editAction = false;
        if($roleAuth->code == 'community' || $roleAuth->code == 'admin'){
            $editAction = true;
        }
        return view('gifts.edit', compact('gift', 'id'))->with([
            'categories'=> $categories,
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
        request()->validate([
            'point' => 'integer|min:0',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8112',
        ]);
        $gift = Gift::find($id);
        $gift->name = $request->get('name');
        $gift->description = $request->get('description');
        $imageName = $gift->thumbnail;
        if(!empty(request()->thumbnail)){
            $imageName = time().'.'.request()->thumbnail->getClientOriginalExtension();

            request()->thumbnail->move(public_path('images/upload'), $imageName);
        }
        $gift->thumbnail = $imageName;
        $gift->point = $request->get('point');
        $gift->category_id = $request->get('category');
        $gift->save();
        return redirect()->route('gifts.index')->with('success', 'Gift was updated successfully.');
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
        $gift->delete_is = 1;
        $gift->save();
        return back()->with('success', 'Gift was deleted successfully.');
    }

    public function ajaxAddCategory(Request $request){
        $response = array(
            'status' => $request->name,
            'msg' => 'Added successfully',
        );
        $category['name'] = $request->name;
        $category['code'] =strtolower(preg_replace('/\s*/', '', $request->name));
        GiftCategory::create($category);

        return response()->json($response);
    }
}
