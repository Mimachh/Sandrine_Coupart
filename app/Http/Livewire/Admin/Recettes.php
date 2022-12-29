<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Regime;
use App\Models\Recette;
use Livewire\Component;
use App\Models\Allergene;
use App\Notifications\NewRecetteCreated;
use Illuminate\Notifications\Notifiable;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Recettes extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Notifiable;

    
    public $recettes, $photo, $allergenes, $allergenes_id, $regimes;
    
    public $state = [];

    public $updateMode = false;
    public $createMode = false;

    public function mount()
    {
        $this->recettes = Recette::all();
        $this->regimes = Regime::all();
        $this->allergenes = Allergene::all();
    }

    private function resetInputFields()
    {
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
            'photo' => 'nullable|image|max:2048',
                
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
            'photo.image' => 'La photo n\'est pas au bon format !',
            'photo.max' => 'La photo est trop lourde !',
        ]
        )->validate();


        /* USE FOR AVOID ERROR MESSAGE UNDIFINED ARRAY KEY */
            if(isset($this->state['photo'])) {
                $name_file = md5($this->state['photo'] . microtime()).'.'.$this->state['photo']->extension();
                $this->state['photo']->storeAs('recettes_photos', $name_file);
                $img = Image::make(public_path("/storage/recettes_photos/{$name_file}"))->fit(1795, 1200);
                $img->save();    
            }
            else {
                $name_file = NULL;
            }
            if(! isset($this->state['patient_only'])) {
                $this->state['patient_only'] = NULL; }

        /* /USE FOR AVOID ERROR MESSAGE UNDIFINED ARRAY KEY */


        $create = Recette::create([
            'title' => $this->state['title'],
            'description' => $this->state['description'],
            'preparation' => $this->state['preparation'],
            'rest' => $this->state['rest'],
            'cooking' => $this->state['cooking'],
            'ingredients' => $this->state['ingredients'],
            'steps' => $this->state['steps'],
            'patient_only' => $this->state['patient_only'],
            'photo' => $name_file,
        ]);


        /* PIVOT TABLE */
            if(isset($this->state['allergenes_id'])){
                $create->allergenes()->sync($this->state['allergenes_id']);
            }
            if(isset($this->state['regimes_id'])){
                $create->regimes()->sync($this->state['regimes_id']);
            }
        /* /PIVOT TABLE */

        /* FIND IDS USER CONCERNED FOR SEND EMAIL*/
        $users = User::whereHas('regimes', function($query) use($create) {
            $query->whereIn('regime_id', $create->regimes->pluck('id'));
        })->get();

        foreach($users as $user){
            $user->notify(new NewRecetteCreated($create));
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
            'title' => 'required|max:60',
            'description' => 'required|max:255',
            'preparation' => 'required|string',
            'rest' => 'required|string',
            'cooking' => 'required|string',
            'ingredients' => 'required|max:255',
            'steps' => 'required|max:255',
            'patient_only' => 'nullable|boolean',
            'photo' => 'nullable|image|max:2048',
        ], [  
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
            'photo.image' => 'La photo n\'est pas au bon format !',
            'photo.max' => 'La photo est trop lourde !',
        ] )->validate();


        

        if ($this->state['id']) {
            $recette = Recette::find($this->state['id']);

            /* Photo */
                if(isset($this->state['photo']))
                {
                    
                    Storage::delete('recettes_photos/'. $recette->photo);
                    $name_file = md5($this->state['photo'] . microtime()).'.'.$this->state['photo']->extension();
                    $this->state['photo']->storeAs('recettes_photos', $name_file);
                    $img = Image::make(public_path("/storage/recettes_photos/{$name_file}"))->fit(1795, 1200);
                    $img->save();
                }
                else {
                    $name_file = $recette->photo;
                }
            /* Fin photo */

            /* DELETE PIVOT TABLE */
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
                'photo' => $name_file,
            ]);

   
            /* PIVOT TABLES */
            if(isset($this->state['allergenes_id'])){
                $recette->allergenes()->sync($this->state['allergenes_id']);
            }
            if(isset($this->state['regimes_id'])){
                $recette->regimes()->sync($this->state['regimes_id']);
            }
            /* END PIVOT TABLES */

            $this->emit('flash', 'Recette bien mise à jour ! ', 'info');

            $this->updateMode = false;
            $this->reset('state');
            $this->recettes = Recette::all();
        }
    }

    public function delete($id)
    {
        if($id){
            $recette = Recette::where('id', $id)->first();
            Recette::where('id',$id)->delete();
            Storage::delete('recettes_photos/'. $recette->photo);

            $this->emit('flash', 'La recette a été supprimée ! ', 'error');

            $this->recettes = Recette::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.recettes', ['recettesWithPagination' => Recette::paginate(5)]);
    }
}
