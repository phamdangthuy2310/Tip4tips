<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\Role;
use App\Model\RoleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $products = Product::all();
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
//        $roletypeAuth = RoleType::getNameByID($roleAuth->roletype_id);
        $editAction = false;
        $deleteAction = false;
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $editAction = true;
            $deleteAction = true;
            $createAction = true;
        }
        $products = DB::table('products')
            ->join('productcategories', 'products.category_id', 'productcategories.id')
        ->select('products.*', 'productcategories.name as category')
        ->get();
        return view('products.index')->with([
            'products'=>$products,
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
        $categories = ProductCategory::all();
        $auth = Auth::user();
        $roleAuth = Role::getInfoRoleByID($auth->role_id);
        $createAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $createAction = true;
        }
        return view('products.create')->with(['categories'=> $categories, 'createAction' => $createAction]);
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
        $product = $this->validate($request, [
            'name' => 'required'
        ]);
        $product['description'] = $request->description;
        $product['price'] = $request->price;
        $product['quality'] = $request->quality;
        $product['thumbnail'] = $request->thumbnail;
        $product['category_id'] = $request->category;
        Product::create($product);
        return redirect('products')->with('success', 'Product added successfully');

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
//        $product = Product::find($id);
        $product = DB::table('products')
        ->join('productcategories', 'productcategories.id', 'products.category_id')
        ->select('products.*', 'productcategories.name as category')
        ->first();
        return view('products.show', compact('product', 'id'));
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
        $editAction = false;
        if($roleAuth->code == 'sale' || $roleAuth->code == 'admin'){
            $editAction = true;
        }
        $product = Product::find($id);
        $categories = ProductCategory::all();
        return view('products.edit', compact('product', 'id'))->with([
            'categories'=>$categories,
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
        $product = Product::find($id);
//        $product = $this->validate($request, [
//            'name' => 'required'
//        ]);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $price = $request->get('price');
        if(empty($price)){
            $price = 0;
        }
        $product->price = $price;
        $quality = $request->get('quality');
        if(empty($quality)){
            $quality = 0;
        }
        $product->quality = $quality;
        $product->category_id = $request->get('category');
        $product->save();
        return redirect('products')->with('success', 'Product updated successfully');
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
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }

    public function ajaxAddCategory(Request $request){
        $response = array(
            'status' => $request->name,
            'msg' => 'Added successfully',
        );
        $category['name'] = $request->name;
        $category['code'] =strtolower(preg_replace('/\s*/', '', $request->name));
        ProductCategory::create($category);

        return response()->json($response);
    }
}
