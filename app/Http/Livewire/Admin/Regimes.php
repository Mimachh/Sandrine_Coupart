<?php

namespace App\Http\Livewire\Admin;

use App\Models\Regime;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class Regimes extends Component
{
    use WithPagination;
    
    public $regimes;
    public $state = [];
    public $updateMode = false;
    public $createMode = false;

    public function mount()
    {
        $this->regimes = Regime::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'type' => 'required|max:60',         
        ],[  
            'type.required' => 'Un type de régime est requis !',
            'type.max' => 'Le type ne doit pas dépasser 60 caractères !',
        ]
        )->validate();

        Regime::create($this->state);

        $this->emit('flash', 'Nouveau régime ajouté ! ', 'success');

             
        $this->reset('state');
        $this->createMode = false;
        $this->regimes = Regime::all();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $regime = Regime::find($id);
        
        $this->state = [
            'id' => $regime->id,
            'type' => $regime->type,
        ];
    }

    public function openForm()
    {
        $this->createMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->reset('state');
    }

    public function update()
    {
        $validator = Validator::make($this->state, [
            'type' => 'required|max:60',         
        ],[  
            'type.required' => 'Un type de régime est requis !',
            'type.max' => 'Le type ne doit pas dépasser 60 caractères !',
        ]
        )->validate();


        if ($this->state['id']) {
            $regime = Regime::find($this->state['id']);
            $regime->update([
                'type' => $this->state['type'],
            ]);
            
            $this->emit('flash', 'Régime mis à jour ! ', 'info');
            $this->updateMode = false;
            $this->reset('state');
            $this->regimes = Regime::all();
        }
    }

    public function delete($id)
    {
        if($id){
            Regime::where('id',$id)->delete();
            $this->emit('flash', 'Régime supprimé ! ', 'error');
            $this->regimes = Regime::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.regimes', ['regimesWithPagination' => Regime::paginate(5)]);
    }
}
