<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Allergene;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class Allergenes extends Component
{
    public $allergenes;
    public $state = [];

    public $updateMode = false;
    public $createMode = false;

    use WithPagination;

    public function mount()
    {
        $this->allergenes = Allergene::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'name' => 'required|max:60',         
        ],[  
            'name.required' => 'Un nom est requis !',
            'name.max' => 'Le nom ne doit pas dépasser 60 caractères !',
        ]
        )->validate();

        Allergene::create($this->state);

        $this->emit('flash', 'Un nouvel allergene à bien été crée ! ', 'success');
        $this->reset('state');
        $this->createMode = false;
        $this->allergenes = Allergene::all();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $recette = Allergene::find($id);
        
        $this->state = [
            'id' => $recette->id,
            'name' => $recette->name,
        ];

    }

    public function openForm()
    {
        $this->createMode = true;
    }

    public function cancel()
    {
        if($this->updateMode) {
            $this->updateMode = false;
        }
        if($this->createMode) {
            $this->createMode = false;
        }
        

        $this->reset('state');
    }

    public function update()
    {
        $validator = Validator::make($this->state, [
            'name' => 'required|max:60',         
        ],[  
            'name.required' => 'Un nom est requis !',
            'name.max' => 'Le nom ne doit pas dépasser 60 caractères !',
        ]
        )->validate();


        if ($this->state['id']) {
            $allergene = Allergene::find($this->state['id']);
            $allergene->update([
                'name' => $this->state['name'],
            ]);
            
            $this->emit('flash', 'Votre allergène à été mis à jour ! ', 'info');

            $this->updateMode = false;
            $this->reset('state');
            $this->allergenes = Allergene::all();
        }
    }

    public function delete($id)
    {
        if($id){
            Allergene::where('id',$id)->delete();
            $this->emit('flash', 'Allergène supprimé ! ', 'error');
            $this->allergenes = Allergene::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.allergenes', ['allergenesWithPagination' => Allergene::paginate(5)]);
    }
}
