<?php

namespace App\Http\Controllers;

use App\Models\IdeaComment;
use Illuminate\Http\Request;

class IdeaCommentController extends Controller
{
    public function store(Resuqest $resquest) {
        Validator::make($request->all(), [
           'content' => ['required', 'string', 'max:5000'],
        ])->validate();

        $ideacomment = new IdeaComment();
        $ideacomment->content = $request->content;
        $ideacomment->user_id = auth()->user()->id;
        $ideacomment->save();

        return redirect()->route('ideas.show', $idea_id)->with('succes', 'Commentaire ajouté');
    }

    public function destroy($id) {
        $ideacomment = IdeaComment::findOrFail($id);

        if($ideacomment->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Action non autorisé.');
        }
        $ideacomment->delete();

        return redirect()->back()->with('success', 'Commenteaire suprimé avec succes.');
    }

}
