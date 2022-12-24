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

    public function created_date() 
    {
        $date = $this->created_at;
        return "le ".date('d/m/y', strtotime($date)). " à ".date('h', strtotime($date))."h".date('m', strtotime($date));
    }

    public function updated_date() 
    {
        $date = $this->update_at;
        return date('d/m/y', strtotime($date));
    }
}
