<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use function Pest\Laravel\patch;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        $editors = Editor::all();
        return view('pages.post.create',compact('editors', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'content'=> ['required', 'string'],
            'description' => ['required', 'string', 'max:2000'],
            'image' => ['required', 'file'],

        ])->validate();

        if($request->hasFile('image')) {
            //suvegarder l'image
            $path = $request->image->storePublicly('post/covers', ['disk' => 'public']);
        }else {
            $path = '';
        }

        //save
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->image = $path;
        $post->editor_id = auth()->user()->id;  // Assigner l'ID de l'utilisateur connecté
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Article ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('pages.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post)
    {
        $editors = Editor::all();
        return view('pages.post.edit', compact('editors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'content'=> ['required', 'string'],
            'description' => ['required', 'string', 'max:2000'],
            'image' => ['required', 'file'],

        ])->validate();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post && $post->id != null) {
            $post->delete();
        }
        return redirect()->route('posts.index');
    }
}
