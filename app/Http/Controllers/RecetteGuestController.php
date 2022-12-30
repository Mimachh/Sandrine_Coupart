<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;

class RecetteGuestController extends Controller
{
    public function index()
    {
        //* FOR VISITORS */
        $receipts_visitors = Recette::where('patient_only', NULL)->paginate(3);

        return view('recettes.visitors', [
            'receipts_visitors' => $receipts_visitors,
        ]);
    }
  
}
