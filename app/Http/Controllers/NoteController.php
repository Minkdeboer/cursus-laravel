<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::where('user_id', optional(auth()->user())->id)
        ->where('archived', 0)
        ->when(request()->has('search') && request()->filled('search'), function ($query){
           $search = request('search');
           $query->where('title', 'like', '%'.$search.'%')
           ->orWhere('content', 'like', '%'.$search.'%');
        })
        ->latest()->get();
        return view('dashboard', compact('notes'));
    }

    function changeAppearance(Request $request)
    {
        $note = Note::where('user_id', auth()->user()->id)
            ->where('id', $request->id)
            ->first();
        $note->update([
            'color_name' => $request->color,
            'appearance_type' => $request->type,
            'image_path' => $request->image,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Appearance updated successfully',
        ]);
 
    }

    function archived() {
        $notes = Note::where('user_id', auth()->user()->id)
        ->where('archived', 1)->latest()->get();
        return view('archived', compact('notes'));
    }

    function putArchived(Request $request, $id){
        $note = Note::where('user_id', auth()->user()->id)
        ->where('id', $request->id)
        ->first();
    $note->update([
        
        'archived' => 1,
    ]);

     return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Note::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back();
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
        $note = Note::findOrFail($id);
        $note->update([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    function trash() {
        $notes = Note::where('user_id', auth()->user()->id)
        ->onlyTrashed()->latest()->get();
        return view('trash-bin', compact('notes'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->back();
    }
}
