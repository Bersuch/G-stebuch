<?php
namespace App\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilePage {


    public function profileAction($id) 
    {
        $users = DB::table('users')
        ->select('name', 'email', 'is_admin')
        ->where('id', '=', $id)
        ->get();
        return view('profile-layout', ['users' => $users]);
    }

    public function viewOwnProfile() {
        $users = DB::table('users')
        ->select('name', 'email', 'is_admin')
        ->where('id', '=', auth()->id())
        ->get();
        return view('profile-layout', ['users' => $users]);
    }

}