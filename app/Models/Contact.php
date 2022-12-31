<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'subject_id',
        'message',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


    public function status()
    {
        if($this->status === 1){
            return 'Non Lu';
        }
        if($this->status === 0){
            return 'Lu';
        }
    }
}
