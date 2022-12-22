<?php

namespace App\Models;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allergene extends Model
{
    use HasFactory;

    public function recettes()
    {
        return $this->belongsToMany(Recette::class);
    }
}
