<?php

namespace Book\Http\Controllers\Admin;

use Book\Comment;
use Book\Http\Controllers\Controller;
use Book\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->with('user', 'product')->paginate('10');

        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function filterRating($rating)
    {
        $comments = Comment::where('rating_quality', $rating)->orWhere('rating_price', $rating)->orWhere('rating_value', $rating)->orderBy('created_at', 'desc')->with('user', 'product')->paginate('10');

        return view('admin.comments.index', [
            'comments' => $comments,
            'option'   => $rating,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::with('user', 'product')->find($id);

        return view('admin.comments.show', ['comment' => $comment]);
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
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

        return redirect()->back()->with([
            'type'    => 'success',
            'message' => 'Cập nhật thành công',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with([
            'type'    => 'success',
            'message' => 'Đã xóa',
        ]);
    }
}
