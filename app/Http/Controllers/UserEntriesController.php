<?php

namespace App\Http\Controllers;

use App\Models\UserEntries;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserEntriesRequest;
use App\Http\Requests\UpdateUserEntriesRequest;

class UserEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserEntriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserEntries $userEntries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserEntries $userEntries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserEntriesRequest $request, UserEntries $userEntries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserEntries $userEntries)
    {
        //
    }
}
