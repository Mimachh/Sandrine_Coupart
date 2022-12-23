<?php

namespace App\Http\Livewire;

use App\Models\Recette;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Recettes extends Component
{
    public $recettes;
    public $state = [];

    public $updateMode = false;

    public function mount()
    {
        $this->recettes = Recette::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'title' => 'required',
            'description' => 'required|max:255',
            'preparation' => 'required|string',
            'rest' => 'required|string',
            'cooking' => 'required|string',
            'ingredients' => 'required|max:255',
            'steps' => 'required|max:255',
            'patient_only' => 'nullable|boolean',
        ])->validate();

        Recette::create($this->state);

        $this->reset('state');
        $this->recettes = Recette::all();
    }

    public function edit($id)
    {
        $this->updateMode = true;

        $recette = Recette::find($id);

        $this->state = [
            'id' => $recette->id,
            'title' => $recette->title,
            'description' => $recette->description,
            'preparation' => $recette->preparation,
            'rest' => $recette->rest,
            'cooking' => $recette->cooking,
            'ingredients' => $recette->ingredients,
            'steps' => $recette->steps,
            'patient_only' => $recette->patient_only,
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
            'title' => 'nullable',
            'description' => 'nullable|max:255',
            'preparation' => 'nullable|string',
            'rest' => 'nullable|string',
            'cooking' => 'nullable|string',
            'ingredients' => 'nullable|max:255',
            'steps' => 'nullable|max:255',
            'patient_only' => 'nullable|boolean',
        ])->validate();


        if ($this->state['id']) {
            $recette = Recette::find($this->state['id']);
            $recette->update([
                'title' => $this->state['title'],
                'description' => $this->state['description'],
                'preparation' => $this->state['preparation'],
                'rest' => $this->state['rest'],
                'cooking' => $this->state['cooking'],
                'ingredients' => $this->state['ingredients'],
                'steps' => $this->state['steps'],
                'patient_only' => $this->state['patient_only'],
            ]);


            $this->updateMode = false;
            $this->reset('state');
            $this->recettes = Recette::all();
        }
    }

    public function delete($id)
    {
        if($id){
            Recette::where('id',$id)->delete();
            $this->recettes = Recette::all();
        }
    }

    public function render()
    {
        return view('livewire.recettes');
    }
}
