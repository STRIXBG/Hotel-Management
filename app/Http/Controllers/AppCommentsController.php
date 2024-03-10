<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AppComment;

class AppCommentsController extends Controller {
    /*
     * Displays AppComments
     */

    public function index() {
        $comments = AppComment::all();
        return view('appcomments.index', compact('comments'));
    }

    /*
     * Creates Appcomment
     */

    public function create() {
        return view('appcomments.create');
    }

    /*
     * Stores Appcomment in DB
     */

    public function store(Request $request) {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to create a comment.');
        }

        $user = Auth::user();
        $hasCommented = $user->comments()->exists();

        if ($hasCommented) {
            return back()->with('error', 'You have already commented once.');
        }


        $request->validate([
            'title' => 'required',
            'comment' => 'required',
        ]);

        $comment = new AppComment([
            'title' => $request->title,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
        ]);

        $comment->save();

        return redirect()->route('comments.index')
                        ->with('success', 'Comment created successfully');
    }

    /*
     * Shows Appcomment
     */

    public function show(AppComment $comment) {
        return view('appcomments.show', compact('comment'));
    }

    /*
     * Edits selected Appcomment
     */

    public function edit(AppComment $comment) {
        return view('appcomments.edit', compact('comment'));
    }

    /*
     * Updates Appcomment
     */

    public function update(Request $request, AppComment $comment) {
        $request->validate([
            'title' => 'required',
            'comment' => 'required',
        ]);

        $comment->update($request->all());

        return redirect()->route('comments.index')
                        ->with('success', 'Comment updated successfully');
    }

    /*
     * Destroys Appcomment
     */

    public function destroy(AppComment $comment) {
        $comment->delete();

        return redirect()->route('appcomment.index')
                        ->with('success', 'Comment deleted successfully');
    }
}
