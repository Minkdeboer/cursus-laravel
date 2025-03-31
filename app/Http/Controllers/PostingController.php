<?php

namespace App\Http\Controllers;

use App\Events\PostingCreateEvent;
use App\Http\Controllers\Controller;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostingCreateMail;

class PostingController extends Controller
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
    public function store(Request $request)
    {

        $posting = new Posting();
        $posting->title = 'Test Title';
        $posting->description = 'Test Description';
        $posting->save();

        event(new PostingCreateEvent("john@gmail.com"));

        // Mail::to('test@gmail.com')->send(new PostingCreateMail);
        dd($posting);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
