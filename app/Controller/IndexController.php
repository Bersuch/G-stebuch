<?php
namespace App\Controller;

use App\http\Requests\GuestBookEntryRequest;
use App\http\Requests\StoreUserEntriesRequest;
use App\Models\GuestBookEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController {

    public function indexAction(Request $request) 
    {

        $entries_user = DB::table('guest_book_entries')
        ->join('users', 'guest_book_entries.user_id', '=', 'users.id')
        ->select('guest_book_entries.*', 'users.name', 'users.is_admin')
        ->orderByDesc('guest_book_entries.id')
        ->paginate(2);

        $user = DB::table('users')
        ->select('id', 'is_admin')
        ->find(auth()->id());
        
        //dd($entries);

        return view('dashboard', ['entries_user' => $entries_user, 'user' => $user]);    
    }

    public function saveAction(GuestBookEntryRequest $GuestBookRequest) {
        $validated = $GuestBookRequest->validated();
        GuestBookEntry::create($validated);
        return redirect()->route('dashboard')->with('success', 'Erfolgreich gespeichert');
    }

    public function showPostAction($id) {
        $entries_user = DB::table('guest_book_entries')
        ->join('users', 'guest_book_entries.user_id', '=', 'users.id')
        ->select('guest_book_entries.*', 'users.name', 'users.is_admin')
        ->where('guest_book_entries.id', '=', $id)
        ->orderByDesc('guest_book_entries.id')
        ->paginate(2);

        $user = DB::table('users')
        ->select('id', 'is_admin')
        ->find(auth()->id());

        $post = GuestBookEntry::whereId($id)
        ->with('user:id,name', 'comments')
        ->first();

        //dd($comments->toArray());

        return view('show', ['entries_user' => $entries_user, 'user' => $user, 'post' => $post]);
    }
}