<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\User;
use Livewire\Component;

class ApproveUsers extends Component
{

    public $who;
    public $approval;

    public function render(){
        $users = User::where('is_majority',false)->paginate(10);
        return view('livewire.approve-users', [
            'unverified_users' => $users,
        ]);
    }
    public function submit(){
        // \Log::info($this->who);
        \Log::info($this->approval);
        User::where('id',$this->approval)->update(['is_majority'=>true]);
    }
}
// https://www.nicesnippets.com/blog/laravel-livewire-dynamically-add-or-remove-input-fields