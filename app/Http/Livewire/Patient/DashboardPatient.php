<?php

namespace App\Http\Livewire\Patient;

use App\Models\Rating;
use Livewire\Component;

class DashboardPatient extends Component
{

    public $pages = [ 1=>1, 2=>2 ];
    public $currentPage = 1;
    public $ratings;

    public function goToPageFav()
    {
        $this->currentPage = 1;
    }

    public function goToPageRate()
    {
        $this->currentPage = 2;
    }

    public function mount()
    {
        $user = auth()->user()->id;        
        $this->ratings = Rating::where('user_id', $user)->get();;
    }

    public function render()
    {
        return view('livewire.patient.dashboard-patient');
    }
}
