<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuyItem;
use App\Models\Category;


class BuyItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();

        $buyItems = BuyItem::where('user_id',\Auth::user()->id)->get();
        $buyItems->load('postItem','user');

        // dd($buyItems);

        return view('page.buyItem.index',[
            'categories' => $categories,
            'buyItems' => $buyItems,
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        $buyItem = new BuyItem();

        $buyItem->postItem_id = $request->input('postItem_id');
        $buyItem->user_id = $request->input('user_id');
        $buyItem->save();

        return redirect(route('item.index'))->with('buy_success','商品の購入が完了しました');

        
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

        // dd($id);

        BuyItem::destroy($id);

        return redirect(route('buyItem.index'))->with('delete_success','購入履歴から削除しました');
        
    }
}
