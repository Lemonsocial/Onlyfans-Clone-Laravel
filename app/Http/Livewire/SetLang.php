<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\User;
use Livewire\Component;

class SetLang extends Component
{

    public $locale;
    protected $rules = [
        'locale' => 'required|min:2',
    ];

    public function submit()
    {
        $this->validate();
        if(empty($this->locale )){
            return redirect()->to('/user/profile');
        }
        $personal_settings = Auth::user()->personal_settings;
        $personal_settings['Language'] = $this->locale;
        User::where('id', Auth::user()->id)
        ->update(['personal_settings' => json_encode($personal_settings)]);
        return redirect()->to('/user/profile');

    }
    public function render()
    {
        return view('livewire.set-lang');
    }


}

