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

    public function created_date() 
    {
        $date = $this->created_at;
        return "le ".date('d/m/y', strtotime($date)). " à ".date('H', strtotime($date))."h".date('m', strtotime($date));
    }

    public function updated_date() 
    {
        $date = $this->updated_at;
        return "le ".date('d/m/y', strtotime($date)). " à ".date('H', strtotime($date))."h".date('m', strtotime($date));
    }
}
