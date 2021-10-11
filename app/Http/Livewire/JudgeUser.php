<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class JudgeUser extends Component
{
    public $who;
    public $approval;


    public function submit(){
        \Log::info($this->who);
        \Log::info($this->approval);
    }
    public function render()
    {
        $users = User::where('is_majority',false)->paginate(10);
        return view('livewire.judge-user', [
            'users' => $users,
        ]);
    }
    
}
