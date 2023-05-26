<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\GuestBookEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        //dd($request['post_id']);
        $request->validate([
            'body'=>'required',
            'post_id'=>'required'
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        
        //dd($request->all());

        Comment::create($input);

        $post = GuestBookEntry::whereId($request['post_id'])
        ->with('user:id,name', 'comments')
        ->first();
        return back()->with('post', $post);

    }

    public function deleteComment($id) {

        DB::delete('delete from comments where id = ?',[$id]);
        return redirect()->back()->with('success', 'Kommentar Erfolgreich gelöscht');
    }

    public function showComments($id) {
        
        $comments = DB::table('guest_book_entries')
        ->join('users', 'guest_book_entries.user_id', '=', 'users.id')
        ->select('guest_book_entries.*', 'users.name', 'users.is_admin')
        ->where('guest_book_entries.id', '=', $id)
        ->orderByDesc('guest_book_entries.id')
        ->paginate(2);
    }

}
