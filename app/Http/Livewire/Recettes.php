<?php

namespace App\Http\Livewire;

use App\Models\Regime;
use App\Models\Recette;
use Livewire\Component;
use App\Models\Allergene;
use Illuminate\Support\Facades\Validator;

class Recettes extends Component
{
    public $recettes;
    public $allergenes;
    public $regimes;
    public $state = [];

    public $updateMode = false;

    public function mount()
    {
        $this->recettes = Recette::all();
        $this->regimes = Regime::all();
        $this->allergenes = Allergene::all();
        $this->allergenes_id = [''];
    }

    private function resetInputFields(){
        $this->reset('state');
    }
    protected $rules = [
        'allergenes_id.*' => 'nullable|boolean',
        'regimes_id.*' => 'nullable|boolean',
    ];

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

        $create = Recette::create($this->state);
        $create->allergenes()->sync($this->state['allergenes_id']);
        $create->regimes()->sync($this->state['regimes_id']);
        
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
