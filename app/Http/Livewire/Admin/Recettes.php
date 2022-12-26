<?php

namespace App\Http\Livewire\Admin;

use App\Models\Regime;
use App\Models\Recette;
use Livewire\Component;
use App\Models\Allergene;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class Recettes extends Component
{
    use WithPagination;
    
    public $recettes;
    public $allergenes;
    public $allergenes_id;
    public $regimes;
    public $state = [];

    public $updateMode = false;
    public $createMode = false;

    public function mount()
    {
        $this->recettes = Recette::all();
        $this->regimes = Regime::all();
        $this->allergenes = Allergene::all();
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
            'title' => 'required|max:60',
            'description' => 'required|max:255',
            'preparation' => 'required|string',
            'rest' => 'required|string',
            'cooking' => 'required|string',
            'ingredients' => 'required|max:255',
            'steps' => 'required|max:255',
            'patient_only' => 'nullable|boolean',
                
        ],[  
            'title.required' => 'Un titre est requis !',
            'title.max' => 'Le titre ne doit pas dépasser 60 caractères !',
            'description.required' => 'Une description est obligatoire !',
            'description.max' => 'La description ne doit pas dépasser 255 caractères !',
            'preparation.required' => 'Un temps de préparation est obligatoire !',
            'rest.required' => 'Le temps de repos est obligatoire !',
            'cooking.required' => 'Le temps de cuisson est obligatoire !',
            'ingredients.required' => 'Merci de renseigner des ingrédients !',
            'ingredients.max' => 'Les ingrédients ne doivent pas dépasser 255 caractères !',
            'steps.required' => 'Merci de renseigner des étapes !',
            'steps.max' => 'Les étapes ne doivent pas dépasser 255 caractères !',
        ]
        )->validate();

        $create = Recette::create($this->state);
        if(isset($this->state['allergenes_id'])){
            $create->allergenes()->sync($this->state['allergenes_id']);
        }
        if(isset($this->state['regimes_id'])){
            $create->regimes()->sync($this->state['regimes_id']);
        }
        
        $this->emit('flash', 'Une nouvelle recette à bien été crée ! ', 'success');
        
        $this->reset('state');
        $this->createMode = false;
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

            $recette->allergenes()->detach();
            $recette->regimes()->detach();

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
            
            if(isset($this->state['allergenes_id'])){
                $recette->allergenes()->sync($this->state['allergenes_id']);
            }
            if(isset($this->state['regimes_id'])){
                $recette->regimes()->sync($this->state['regimes_id']);
            }

            $this->emit('flash', 'Recette bien mise à jour ! ', 'info');

            $this->updateMode = false;
            $this->reset('state');
            $this->recettes = Recette::all();
        }
    }

    public function delete($id)
    {
        if($id){
            Recette::where('id',$id)->delete();
            $this->emit('flash', 'La recette a été supprimée ! ', 'error');
            $this->recettes = Recette::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.recettes', ['recettesWithPagination' => Recette::paginate(5)]);
    }
}
