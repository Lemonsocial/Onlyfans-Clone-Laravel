<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadBackgroundImage extends Component
{
    use WithFileUploads;

    public $photo;
    
    protected $rules = [
        'photo' => ['required', 'image', 'max:4096'],

        // 'idexpires' => ['required']
        // 'confirm_content'=>['nullable', 'string', 'max:100']
    ];
    public function render()
    {
        return view('livewire.upload-background-image');
    }
    public function save()
    {
        $this->validate();
        try {
            Storage::disk($this->profilePhotoDisk())->delete(Auth::user()->background_photo_path);
        }
        catch(\Exception $e){
            \Log::info($e);
            dd ($e);
        }
        $photo_path = $this->photo->storePublicly('profile-photos', ['disk' => $this->profilePhotoDisk()]);
        User::where('id',Auth::user()->id)->update(['background_photo_path'=>$photo_path]);

        return redirect()->to('/user/profile');

    }

 
    protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
    
}
