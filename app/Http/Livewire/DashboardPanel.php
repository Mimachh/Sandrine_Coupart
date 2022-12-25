<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Regime;
use App\Models\Recette;
use Livewire\Component;
use App\Models\Allergene;

class DashboardPanel extends Component
{
    public $last_recette;
    public $last_user;
    public $last_allergene;
    public $last_regime;  
    public $last_allergene_updated;
    public $last_recette_updated;
    public $last_user_updated;
    public $last_regime_updated; 
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

    public function mount()
    {
        $this->last_recette = Recette::latest()->first();
        $this->last_user = User::latest()->first();
        $this->last_allergene = Allergene::latest()->first();
        $this->last_regime = Regime::latest()->first();

        $this->last_recette_updated = Recette::orderBy('updated_at', 'DESC')->first();
        $this->last_user_updated = User::orderBy('updated_at', 'DESC')->first();
        $this->last_allergene_updated = Allergene::orderBy('updated_at', 'DESC')->first();
        $this->last_regime_updated = Regime::orderBy('updated_at', 'DESC')->first();
    }


    public function render()
    {
        return view('livewire.dashboard-panel');
    }
}
