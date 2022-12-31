<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
   
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.messages', ['messages' => Contact::paginate(5)]);
    }
}
