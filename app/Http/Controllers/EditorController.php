<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $editors = Editor::all();
        $post = Post::all();
        return view('pages.editor.index', compact('editors', compact('posts')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.editor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:2000'],
            'image' => ['required', 'file'],

        ])->validate();

        if($request->hasFile('image')) {
            $path = $request->image->storePublicy('editor/cover', ['disk' => 'public']);
        }else {
            $path= '';
        }

        //save
        $editor = new Editor();
        $editor->name = $request->name;
        $editor->email = $request->email;
        $editor->bio = $request->bio;
        $editor->image = $path;
        $editor->save();

        return redirect()->route('editors.index')->with('succes', 'course ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Editor $editor)
    {
        return view('pages.editor.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Editor $editor)
    {
        return view('pages.editor.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editor $editor)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:2000'],
            'image' => ['required', 'file'],

        ])->validate();

        return redirect()->route('editors.index')->with('succes', 'course ajouté avec success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editor $editor)
    {
        if($editor && $editor->id != null) {
            $editor->delete();
        }
        return redirect()->route('editors.index');
    }
}
