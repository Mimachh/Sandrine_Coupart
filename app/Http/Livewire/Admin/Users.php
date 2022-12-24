<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Users extends Component
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

    public function store()
    {
        $validator = Validator::make($this->state, [
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'role_id' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],         
        ],[  
            'name.required' => "Un nom d'utilisateur est requis !",
            'name.max' => 'Le nom ne doit pas dépasser 60 caractères !',
            'last_name.required' => "Un prénom d'utilisateur est requis !",
            'last_name.max' => 'Le prénom ne doit pas dépasser 60 caractères !',
            'role_id.required' => 'Un rôle est obligatoire !',
            'email.required' => "Une adresse mail est obligatoire !",
            'email.email' => "L'adresse n'est pas valide !",
            'email.max' => "L'adresse mail ne doit pas dépasser 255 caractères !",
            'email.unique' => "L'adresse existe déjà dans la base de données !",
        ]
        )->validate();

        User::create([
            'name' => $this->state['name'],
            'last_name' => $this->state['last_name'],
            'email' => $this->state['email'],
            'role_id' => $this->state['role_id'],
            'password' => Hash::make($this->state['password']),
        ]);
             
        $this->reset('state');
        $this->users = User::all();
    }

    public function edit($id)
    {
        
        $this->updateMode = true;

        $user = User::find($id);  
        $this->state = [
            'id' => $user->id,
            'role_id' => $user->role_id,
            'name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
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
            'name' => 'required|max:60',
            'role_id' => 'required',
            'last_name' => 'required|max:60',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->state['id'])],         
        ],[  
            'name.required' => "Un nom d'utilisateur est requis !",
            'name.max' => 'Le nom ne doit pas dépasser 60 caractères !',
            'role_id.required' => 'Un rôle est obligatoire !',
            'last_name.required' => "Un prénom d'utilisateur est requis !",
            'last_name.max' => 'Le prénom ne doit pas dépasser 60 caractères !',
            'email.required' => "Une adresse mail est obligatoire !",
            'email.email' => "L'adresse n'est pas valide !",
            'email.max' => "L'adresse mail ne doit pas dépasser 255 caractères !",
            'email.unique' => "L'adresse existe déjà dans la base de données !",
        ]
        )->validate();


        if ($this->state['id']) {
            $user = User::find($this->state['id']);
            $user->update([
                'name' => $this->state['name'],
                'last_name' => $this->state['last_name'],
                'email' => $this->state['email'],
                'role_id' => $this->state['role_id'],
            ]);
            
            $this->updateMode = false;
            $this->reset('state');
            $this->users = User::all();
        }
    }

    protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }


    public function delete($id)
    {
        if($id){
            $user = User::where('id',$id)->first();
            User::where('id',$id)->delete();
            
            if($user->profile_photo_path)
            {
                Storage::disk($this->profilePhotoDisk())->delete($user->profile_photo_path);
            }
            $this->users = User::all();
        }
    }

    public function render()
    {
        return view('livewire.admin.users');
    }
}
