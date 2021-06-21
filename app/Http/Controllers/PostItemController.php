<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PostItem;

class PostItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();

        $statuses = [
             '新品、未使用',
             '未使用に近い',
             '目立った傷や汚れなし',
             'やや汚れや傷あり',
             '傷や汚れあり',
             '全体的に状態が悪い',
        ];


        return view('page.postItem.index',[
            'categories' => $categories,
            'statuses' => $statuses,
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
        // dd($request->all());

        $postitems = new PostItem();

        $postitems->name = $request->input('name');
        $postitems->description = $request->input('description');
        $postitems->category_id = $request->input('category_id');
        $postitems->price = $request->input('price');
        $postitems->status = $request->input('status');
        $postitems->user_id = $request->input('user_id');


        $fileName = $request->file('img_url')->getClientOriginalName();

        $request->file('img_url')->storeAs('public/image/',$fileName);

        $fullFilePath = '/storage/image/'. $fileName;

        $postitems->img_url = $fullFilePath;
        

        $postitems->save();

        return redirect(route('postItem.index'))->with('success_message','出品しました');
        

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
    }
}
