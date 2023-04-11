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
       

        /*
        $limit = max(env('LIMIT'),1);
        $maxEntries = GuestBookEntry::count();
        $maxPages = (int)ceil($maxEntries/$limit);
        $page = (int)$request->get('page',1);
        $page = min(max(1,$page), $maxPages);
        $offset = ($page-1) * $limit;
        */

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
}