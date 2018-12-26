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

    public function filterRating5()
    {
        $comments = Comment::where('rating_quality', 5)->orWhere('rating_price', 5)->orWhere('rating_value', 5)->orderBy('created_at', 'desc')->with('user', 'product')->paginate('10');

        return view('admin.comments.index', [
            'comments' => $comments,
            'option'   => 'rating_5',
        ]);
    }

    public function filterRating4()
    {
        $comments = Comment::where('rating_quality', 4)->orWhere('rating_price', 4)->orWhere('rating_value', 4)->orderBy('created_at', 'desc')->with('user', 'product')->paginate('10');

        return view('admin.comments.index', [
            'comments' => $comments,
            'option'   => 'rating_4',
        ]);
    }

    public function filterRating3()
    {
        $comments = Comment::where('rating_quality', 3)->orWhere('rating_price', 3)->orWhere('rating_value', 3)->orderBy('created_at', 'desc')->with('user', 'product')->paginate('10');

        return view('admin.comments.index', [
            'comments' => $comments,
            'option'   => 'rating_3',
        ]);
    }

    public function filterRating2()
    {
        $comments = Comment::where('rating_quality', 2)->orWhere('rating_price', 2)->orWhere('rating_value', 2)->orderBy('created_at', 'desc')->with('user', 'product')->paginate('10');

        return view('admin.comments.index', [
            'comments' => $comments,
            'option'   => 'rating_2',
        ]);
    }

    public function filterRating1()
    {
        $comments = Comment::where('rating_quality', 1)->orWhere('rating_price', 1)->orWhere('rating_value', 1)->orderBy('created_at', 'desc')->with('user', 'product')->paginate('10');

        return view('admin.comments.index', [
            'comments' => $comments,
            'option'   => 'rating_1',
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
