<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\User;
use Livewire\Component;

class SetDarkMode extends Component
{
    public $darkmode;
    
    public function submit()
    {
        $dark = false;
        // $this->validate();
        if($this->darkmode == "enabled"){
            $dark=true;
        }
        if(empty($this->darkmode )){
            return redirect()->to('/user/profile');
        }
        $personal_settings = Auth::user()->personal_settings;
        $personal_settings['Dark Mode'] = $dark;
        User::where('id', Auth::user()->id)
        ->update(['personal_settings' => json_encode($personal_settings)]);
        return redirect()->to('/user/profile');

    }
    public function render()
    {
        return view('livewire.set-dark-mode');
    }
}
