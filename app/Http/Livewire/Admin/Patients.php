<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Regime;
use Livewire\Component;
use App\Models\Allergene;
use Illuminate\Support\Facades\Validator;

class Patients extends Component
{
    public $patients;
    public $state = [];

    public $updateMode = false;

    private function resetInputFields(){
        $this->reset('state');
    }

    public function mount()
    {
        $this->regimes = Regime::all();
        $this->allergenes = Allergene::all();
        $this->patients = User::where('role_id', 2)->get();
    }

    protected $rules = [
        'allergenes_id.*' => 'nullable|boolean',
        'regimes_id.*' => 'nullable|boolean',
    ];

    public function edit($id)
    {
        $this->updateMode = true;

        $user = User::find($id);
        
        $this->state = [
            'id' => $user->id,
            'name' => $user->name,
            'last_name' => $user->last_name,
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
            'name' => 'nullable|max:60',
            'last_name' => 'nullable|max:60',
        ])->validate();


        if ($this->state['id']) {
            $user = User::find($this->state['id']);

            $user->allergenes()->detach();
            $user->regimes()->detach();

            $user->update([
                'name' => $this->state['name'],
                'last_name' => $this->state['last_name'],
            ]);
            
            if(isset($this->state['allergenes_id'])){
                $user->allergenes()->sync($this->state['allergenes_id']);
            }
            if(isset($this->state['regimes_id'])){
                $user->regimes()->sync($this->state['regimes_id']);
            }

            $this->emit('flash', 'Fiche patient bien mise à jour ! ', 'info');

            $this->updateMode = false;
            $this->reset('state');
            $this->patients = User::where('role_id', 2)->get();
        }
    }

    public function deleteThisAllergene($patient, $allergene)
    {
        $user = User::find($patient);
        $user->allergenes()->detach($allergene);
        $this->patients = User::where('role_id', 2)->get();
    }

    public function deleteThisRegime($patient, $regime)
    {
        $user = User::find($patient);
        $user->regimes()->detach($regime);
        $this->patients = User::where('role_id', 2)->get();
    }

    public function deleteAllergene($id)
    {

            $user = User::find($id);
            $user->allergenes()->detach();
            $this->patients = User::where('role_id', 2)->get();
    }
    
    public function render()
    {
        return view('livewire.admin.patients');
    }
}
