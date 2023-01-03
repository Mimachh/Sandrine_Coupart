<?php

namespace App\Http\Livewire\Admin;

use App\Models\Statut;
use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
   
    use WithPagination;

    public $statuts;

    public function mount()
    {
        $this->statuts = Statut::all();
    }

    public function archived(Contact $message)
    {
     
        $message->fill(['statut_id' => 3]);
        if($message->isDirty()) {
            $message->save();
        }
        $this->emit('flash', 'Le message est bien archivé ! ', 'success');

    }

    public function render()
    {
        return view('livewire.admin.messages', ['messages' => Contact::where('statut_id', 4)->paginate(5)]);
    }
}
