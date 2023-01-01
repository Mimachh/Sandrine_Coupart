<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Like extends Component
{
    public $recette;
    
    public function like()
    {
      if(auth()->check()) {

       $response = auth()->user()->fav()->toggle($this->recette->id);
        
        if($response['attached']) {
          $this->emit('flash', 'Ajouté aux favoris', 
          'success'); 
        } else {
          $this->emit('flash', 'Retiré des favoris', 
          'error'); 
        }
      }
     
    }

    public function render()
    {
        return view('livewire.like');
    }
}
