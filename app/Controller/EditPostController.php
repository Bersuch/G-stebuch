<?php
namespace App\Controller;

use Illuminate\Support\Facades\DB;

class EditPostController
{
    public function editPostAction($id) {
        
        $user = DB::table('guest_book_entries')->where('id', $id)->first();
        return view('editPost', ['user' => $user]);
        //return $id;
    }
}
