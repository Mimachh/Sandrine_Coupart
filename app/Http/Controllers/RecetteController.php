<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function index()
    {   
        /* FOR PATIENTS */
            $user = auth()->user();

            $receipts_patients = Recette::whereHas('regimes', function($query) use($user) {
                $query->whereIn('regime_id', $user->regimes->pluck('id'));
            })->paginate(3);

        
        /* FOR ADMIN */
        $receipts_admin = Recette::paginate(3);

       
        return view('recettes.index', [
            'recettes' => $receipts_admin, 
            'receipts_patients' => $receipts_patients,
            ]);
    }

}
