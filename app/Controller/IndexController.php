<?php
namespace App\Controller;

use App\http\Requests\GuestBookEntryRequest;
use App\http\Requests\StoreUserEntriesRequest;
use App\Models\GuestBookEntry;
use Illuminate\Http\Request;

class IndexController {

    public function indexAction(Request $request) 
    {
       

        $limit = max(env('LIMIT'),1);
        $maxEntries = GuestBookEntry::count();
        $maxPages = (int)ceil($maxEntries/$limit);
        $page = (int)$request->get('page',1);
        $page = min(max(1,$page), $maxPages);
        $offset = ($page-1) * $limit;

        $entries = GuestBookEntry::query('')
        ->orderBy('created_at', 'DESC')
        ->offset($offset)
        ->limit($limit)
        ->get();
        
        return view('dashboard', ['entries'=>$entries, 'maxPages'=>$maxPages, 'currentPage'=>$page]);    
    }

    public function saveAction(GuestBookEntryRequest $GuestBookRequest) {
        $validated = $GuestBookRequest->validated();
        GuestBookEntry::create($validated);
        return redirect()->route('dashboard')->with('success', 'Erfolgreich gespeichert');
    }
}