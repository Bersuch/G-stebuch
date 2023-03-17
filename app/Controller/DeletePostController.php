<?php
namespace App\Controller;

use Illuminate\Support\Facades\DB;

class DeletePostController
{
    //
    public function deletePostAction($id) {
        
        DB::delete('delete from guest_book_entries where id = ?',[$id]);
        return redirect()->route('index')->with('success', 'Eintrag Erfolgreich gelöscht');
    }
}
