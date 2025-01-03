<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = $post->cpmments; //relation avec le model post
        return view('pages.comment.index', compact('comments', 'post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('pages.comment.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        Validate::make($request->all(), [
            'content' => ['required', 'string', 'max:5000']
        ])->validate();

        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(), //utilisateur connecté
        ]);
        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('pages.comment.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Comment $comment)
    {
        return view('pages.comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        Validator::make($request->all(), [
            'content' => ['required', 'string', 'max:5000']
        ])->validate();

        $comment->update($request->all());

        return redirect()->route('posts.show', $comment->post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if($comment && $comment->id != null) {
            $comment->delete();
        }
        return redirect()->route('posts.show', $comment->$post);
    }
}
