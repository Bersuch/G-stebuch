<?php
namespace App\Controller;


class DeletePostController
{
    //
    public function deletePostAction($id) {
        
        return view('deletePost', ['id' => $id]);
    }
}
