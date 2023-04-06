<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
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
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateContactRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();
        if ($request->hasFile('picture')) {
            $data['picture'] = str_replace('public', '', $request->file('picture')->store('public'));
        }

        auth()->user()->contact()->create($data);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if ($contact['picture'] != '/default.svg') {
            Storage::delete("public/{$contact['picture']}");
        }
        $contact->delete();
        return redirect('home');
    }
}
