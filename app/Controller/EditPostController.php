<?php
namespace App\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditPostController
{
    public function editPostAction($id) {
        $posts = DB::table('guest_book_entries')
        ->join('users', 'guest_book_entries.user_id', '=', 'users.id')
        ->select('guest_book_entries.*', 'users.name')
        ->where('guest_book_entries.id', $id)
        ->get();

        /*$posts = DB::table('guest_book_entries')
        ->select('id')
        ->find($id);*/

        return view('edit-post', ['posts' => $posts]);
    }

    public function savePostAction(Request $request, $id) {
    
        $subtitle = $request->input('subtitle');
        $body = $request->input('body');
        $user = DB::table('guest_book_entries')
        ->where('id', $id)
        ->update(['subtitle'=>$subtitle, 'body'=>$body]);
        
        return redirect()->route('dashboard')->with('success', 'Eintrag Erfolgreich geändert');
        //return view('editPost', ['user' => $user]);
    }
}
