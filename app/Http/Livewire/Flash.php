<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    public $message;
    public $type;
    
    public $colors = [
        'error' => 'border-red-600 text-red-600 bg-red-200',
        'success' => 'border-green-600 text-green-600 bg-green-200',
        'warning' => 'border-orange-600 text-orange-600 bg-orange-200',
        'info' => ' border-blue-600 text-blue-600 bg-blue-200'
    ];
    
    protected $listeners = ['flash' => 'setFlashMessage'];

    

    public function setFlashMessage($message, $type)
    {
        $this->message = $message;
        $this->type = $type;

        $this->dispatchBrowserEvent('flash-message');
    }

    public function render()
    {
        return view('livewire.flash');
    }
}
