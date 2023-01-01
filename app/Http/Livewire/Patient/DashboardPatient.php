<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;

class DashboardPatient extends Component
{

    public $pages = [ 1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7];
    public $currentPage = 1;

    public function goToPageFav()
    {
        $this->currentPage = 1;
    }

    public function goToPageRate()
    {
        $this->currentPage = 2;
    }

    public function render()
    {
        return view('livewire.patient.dashboard-patient');
    }
}
