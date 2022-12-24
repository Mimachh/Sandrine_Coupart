<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardPanel extends Component
{
    public $currentPage = 1;
    
    public $pages = [ 1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6];

    public function goToPageWelcome()
    {
        $this->currentPage = 1;
    }

    public function goToPageUsers()
    {
        $this->currentPage = 2;
    }


    public function goToPagePatients()
    {
        $this->currentPage = 3;
    }

    public function goToPageRecettes()
    {
        $this->currentPage = 4;
    }

    public function goToPageAllergenes()
    {
        $this->currentPage = 5;
    }

    public function goToPageRegimes()
    {
        $this->currentPage = 6;
    }

    public function render()
    {
        return view('livewire.dashboard-panel');
    }
}
