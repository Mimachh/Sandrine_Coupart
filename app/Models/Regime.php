<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regime extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function recettes()
    {
        return $this->belongsToMany(Recette::class);
    }
}
