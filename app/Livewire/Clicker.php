<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public $name = "secrete name";
    public $email;
    public $password;

    public function create(){
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password
        ]);
    }
    public function render()
    {
            $user = User::all();
        return view('livewire.clicker',compact('user'));
    }
}
