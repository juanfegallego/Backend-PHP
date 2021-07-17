<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Comment;
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
        $comment = auth()->user()->comment;

        return response()->json([
            'success' => true,
            'data' => $comment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'description' => 'required'
        ]);

        $comment = new Comment();
        $comment->title = $request->title;
        $comment->description = $request->description;

        if (auth()->user()->comments()->save($comment))
            return response()->json([
                'success' => true,
                'data' => $comment->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Comment not added'
            ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = auth()->user()->posts()->find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found '
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $comment->toArray()
        ], 400);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $id)
    {
        $comment = auth()->user()->comments()->find($id);

        if (!$comments) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found'
            ], 400);
        }

        $updated = $post->fill($request->all())->save();

        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Post can not be updated'
            ], 500);
    
    }
    public function destroy($id)
    {
        $comment = auth()->user()->posts()->find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found'
            ], 400);
        }

        if ($comment->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'comment can not be deleted'
            ], 500);
        }
    }
}
