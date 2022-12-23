<?php

namespace App\Models;

use App\Models\User;
use App\Models\Recette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allergene extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function recettes()
    {
        return $this->belongsToMany(Recette::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
