<?php

namespace App\Http\Livewire\Patient;

use App\Models\Rating;
use Livewire\Component;

class Rate extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $recette;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];


    public function mount()
    {
        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('recette_id', $this->recette->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        } 
    }

    public function delete($id)
    {
        
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id) || (auth()->user()->role->name === 'Admin')) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {
        
        $rating = Rating::where('user_id', auth()->user()->id)->where('recette_id', $this->recette->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->recette_id = $this->recette->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->recette_id = $this->recette->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        $this->hideForm = true;

    }

    public function render()
    {
        $comments = Rating::where('recette_id', $this->recette->id)->where('status', 1)->with('user')->get(); 

        return view('livewire.patient.rate', compact('comments'));
    }
}
