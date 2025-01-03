<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller

{
    public function index() {
        $ideas = Idea::all();
        return view('pages.idea.index');
    }

    public function create() {
        return view('pages.idea.create');
    }

    public function store(Request $request)
    {
        Validator::make($reques->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100']
        ])->validate();

        $idea = new Idea();
        $idea->title = $request->title;
        $idea->description = $request->description;
        $idea->category = $request->category;
        $idea->user_id = auth()->user()->id;
        $idea->save();

        return redirect()->route('ideas.index')->with('success', 'Idée ajoutée avec succes.');
    }

    public function show($id) {
        $idea = Idea::witch('comments.user')->findOrFail($id);
        return view('pages.idea.show', compact('idea'));
    }

    public function update(Request $reques, $id) {
        Validator::make($reques->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
        ])->validate();

        return redirect()->route('ideas.index')->with('success', 'Ideée mise à jour avec succes');
    }

    public function destroy($id) {
        $ideas = Idea::findOrFail($id);
        $idea->delete();

        return redicrect()->route('ideas.index')->with('sucess', 'Idée supprimée avec succes');
    }
}
