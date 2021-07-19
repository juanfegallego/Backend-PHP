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
        $user = auth()->user();

        $this->validate($request, [
            'title' => 'required',
            'parties_id' => 'required'
        ]);

        $party = Comment::create ([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'parties_id' => $request -> parties_id,
        ]);

        if ($party) {

            return response() ->json([
                'success' => true,
                'data' => $party
            ], 200);
    
        }

        return response() ->json([
            'success' => false,
            'message' => 'Party not added',
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
        //
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
