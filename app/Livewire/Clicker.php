<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3|max:50')]
    public $name ='';
    #[Rule('required|email|max:255|unique:users')]
    public $email ='';

    #[Rule('required|min:5')]
    public $password ='';

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function create(){
       $validated = $this->validate();
            if($this->image){
              $validated['image'] = $this->image->store('uploads','public');
            }
        User::create($validated);

      session()->flash('success', 'User created');
        $this->reset(['name','email','password','image']);
    }

    public function render()
    {
        return view('livewire.clicker');
    }
}
