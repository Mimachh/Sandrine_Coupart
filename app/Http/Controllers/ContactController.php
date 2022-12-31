<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subject;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('contact.create', ['subjects' => $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $data = $request->validate([
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|max:255',
            'phone' => 'required|max:10',
            'subject_id' => 'required|min:1',
            'message' => 'required|max:255',
        ], [
            'name.required' => 'Votre nom doit être renseigné',
            'name.max' => 'Votre nom ne doit pas dépasser 60 caractères',
            'last_name.required' => 'Votre prénom doit être renseigné',
            'email.max' => 'Votre mail ne doit pas dépasser 255 caractères',
            'email.required' => 'Vous devez renseigner votre mail',
            'phone.required' => 'Merci d\'indiquer votre numéro',
            'phone.max' => 'Votre numéro doit être composé de 10 chiffres maximum',
            'subject_id.required' => 'Vous devez indiquer un sujet',
            'message.required' => 'Merci de renseigner votre demande',
            'message.max' => 'Votre message ne doit pas dépasser 255 caractères',
        ]);

        $create = Contact::create($data);
       
        return redirect()->route('contact.confirmation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
