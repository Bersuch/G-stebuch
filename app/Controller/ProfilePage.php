<?php
namespace App\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilePage {

    public function profileAction($id) 
    {
        $users = DB::table('users')
        ->select('name', 'email')
        ->where('id', null, $id)
        ->get();
        return view('profile-layout', ['users' => $users]);
    }

    public function profileAction2() 
    {
        $users = DB::table('users')
        ->select('name', 'email')
        ->get();
        return view('profile-layout', ['users' => $users]);
    }

}