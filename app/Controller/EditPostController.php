<?php
namespace App\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditPostController
{
    public function editPostAction($id) {
        
        $user = DB::table('guest_book_entries')->where('id', $id)->first();
        return view('editPost', ['user' => $user]);
        //return $id;
    }

    public function savePostAction(Request $request, $id) {
    
        $subtitle = $request->input('subtitle');
        $body = $request->input('body');
        $user = DB::table('guest_book_entries')
        ->where('id', $id)
        ->update(['subtitle'=>$subtitle, 'body'=>$body]);
        
        return redirect()->route('index')->with('success', 'Eintrag Erfolgreich geändert');
        //return view('editPost', ['user' => $user]);
    }
}
