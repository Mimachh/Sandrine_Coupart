<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Patients extends Component
{
    public $patients;

    public function mount()
    {
        $this->patients = User::where('role_id', 2)->get();
    }
    
    public function render()
    {
        return view('livewire.patients');
    }
}
