<?php

namespace App\Http\Controllers\Api;

use App\Model\Gift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftsAPIController extends Controller
{
    /*===========================================================================
     * CONTROLLER FOR API
     * ==========================================================================*/
    public function index(){
        $gifts = Gift::getAllGifts();
        return $gifts;
    }

    public function show(Gift $id){
        return $id;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8112'
        ]);
        $gift = Gift::create($request->all());

        return response()->json($gift, 201);
    }

    public function update(Request $request, Gift $gift)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $gift->update($request->all());

        return response()->json($gift, 200);
    }

    public function delete(Gift $gift)
    {
        $gift->delete();

        return response()->json(null, 204);
    }
}
