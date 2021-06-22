<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $comment = new Comment();

        $comment->content = $request->input('content');
        $comment->user_id = $request->input('user_id');
        $comment->post_item_id = $request->input('post_item_id');
        $comment->save();
        
        return redirect(route('comment.show',$comment->post_item_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $categories = Category::all();

        // $myComments = Comment::where('user_id',\Auth::user()->id)->get();

        // $otherComments = Comment::where('post_item_id',$id)
        //                         ->where('user_id','<>',\Auth::user()->id)->get();

        $comments = Comment::where('post_item_id',$id)->get();
        $comments->load('user');

        // dd($comments);

        return view('page.items_comment.show',[
            'categories' => $categories,
            'comments' => $comments,
            'id' => $id
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
