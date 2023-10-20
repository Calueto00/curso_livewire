<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public $name ='';
    public $email ='';
    public $password ='';

    public function create(){
        $this->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|unique:users',
            'password'=>'required|min:5'
        ]);
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password
        ]);

        request()->session()->flash('success','User created successfully');
        $this->reset(['name','email','password']);
    }
    
    public function render()
    {
            $user = User::all();
        return view('livewire.clicker',compact('user'));
    }
}
