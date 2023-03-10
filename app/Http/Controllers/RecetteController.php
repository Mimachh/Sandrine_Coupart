<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recette;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* FOR PATIENTS */
            $user = auth()->user();

            $receipts_patients = Recette::whereHas('regimes', function($query) use($user) {
                $query->whereIn('regime_id', $user->regimes->pluck('id'));
            })->where('statut_id', 1)->paginate(3);

        
        /* FOR ADMIN */
        $receipts_admin = Recette::where('statut_id', 1)->paginate(3);
        
        $avgRate = Rating::avg('rating');
       
        return view('recettes.index', [
            'recettes' => $receipts_admin, 
            'receipts_patients' => $receipts_patients,
            'avgRate' => $avgRate,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        $avgRate = Rating::avg('rating');
        
        return view('recettes.show', ['recette' => $recette, 'avgRate' => $avgRate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function edit(Recette $recette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recette $recette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recette $recette)
    {
        //
    }
}
