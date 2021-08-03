<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Item::get();
        return $result;
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
        $item = new Item;
        $item->name = $request->name;
        $item->code = $request->code;
        $item->price = $request->price;
        $item->save();

        return $item;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        // $result = DB::table('items')->where('id', $item->id)->get();
        $result = Item::Where('id', $item->id)->first();
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $result = Item::Where('id', $item->id)->first();
        $result->name = $request->name;
        $result->code = $request->code;
        $result->price = $request->price;
        $result->save();

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $result = Item::Where('id', $item->id)->delete();
        return $result;
    }
}
