<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Roles extends Component
{
    public $users;
    public $roles;
    public $state = [];
    public $updateMode = false;

    public function mount()
    {
        $this->users = User::all();
        $this->roles = Role::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function edit($id)
    {
        
        $this->updateMode = true;

        $user = User::find($id);  
        $this->state = [
            'id' => $user->id,
            'role_id' => $user->role_id,
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
            'role_id' => 'required|integer',         
        ],[  
            'role_id.required' => 'Un role est obligatoire !',
            'type.integer' => 'La valeur entrée ne correspond à rien !',
        ]
        )->validate();


        if ($this->state['id']) {
            $user = User::find($this->state['id']);
            $user->update([
                'role_id' => $this->state['role_id'],
            ]);
            
            $this->updateMode = false;
            $this->reset('state');
            $this->users = User::all();
        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            $this->users = User::all();
        }
    }

    public function render()
    {
        return view('livewire.roles');
    }
}
