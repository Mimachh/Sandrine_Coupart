<?php

namespace App\Models;

use App\Models\Regime;
use App\Models\Allergene;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recette extends Model
{
    use HasFactory;

    public function allergenes()
    {
        return $this->belongsToMany(Allergene::class);
    }

    public function regimes()
    {
        return $this->belongsToMany(Regime::class);
    }

    protected $fillable = [
        'title',
        'description',
        'preparation',
        'rest',
        'cooking',
        'ingredients',
        'steps',
        'patient_only',
    ];
}
