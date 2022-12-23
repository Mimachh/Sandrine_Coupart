<?php

namespace App\Http\Livewire;

use App\Models\Regime;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Regimes extends Component
{
    public $regimes;
    public $state = [];
    public $updateMode = false;

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
             
        $this->reset('state');
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
            
            $this->updateMode = false;
            $this->reset('state');
            $this->regimes = Regime::all();
        }
    }

    public function delete($id)
    {
        if($id){
            Regime::where('id',$id)->delete();
            $this->regimes = Regime::all();
        }
    }

    public function render()
    {
        return view('livewire.regimes');
    }
}
