<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProveIdentity extends Component
{
    use WithFileUploads;

    public $photo_front;
    public $photo_side_by_side;
    public $idtype;
    public $idexpires;
    public $releases = [];

    protected $rules = [
        'photo_front' => ['required', 'image', 'max:4096'],
        'photo_side_by_side' => ['required', 'image', 'max:4096'],
        'idtype' => ['required', 'string', 'max:100'],
        'releases.*' => 'nullable|image|max:4096', 
        // 'idexpires' => ['required']
        // 'confirm_content'=>['nullable', 'string', 'max:100']
    ];

    public function render()
    {
        return view('livewire.prove-identity');
    }
        protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
    public function save()
    {
        // \Log::info(json_encode($data));
        $this->validate();
        $identification = Auth::user()->identification;
        $release_urls = [];
        if(isset($this->releases)){

            foreach ($this->releases as $release) {
                $release_url = $release->storePublicly('release-photos', ['disk' => $this->profilePhotoDisk()]);
                array_push($release_urls,$release_url);
            }
                $identification['releases'] = json_encode($release_urls);
        }
        if(isset($this->photo_front)){

            $front_side_url = $this->photo_front->storePublicly('identification-photos', ['disk' => $this->profilePhotoDisk()]);
           
            $identification['identification_front_side_url'] = $front_side_url;
        }
        
        if(isset($this->photo_side_by_side)){
            $side_by_side_url = $this->photo_side_by_side->storePublicly('identification-photos', ['disk' => $this->profilePhotoDisk()]);
            $identification['identification_side_by_side_url'] = $side_by_side_url;
        }

        if(isset($this->idtype)){
            $identification['identification_type'] = $this->idtype;
        }
        if(isset($this->idexpires)){
            $identification['identification_expires_on'] = $this->idexpires;
            
        }
        \Log::info(json_encode($identification));
        User::where('id', Auth::user()->id)->update(['identification' => json_encode($identification)]);
        return redirect()->to('/user/profile');
    }

 
    protected function PhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
    
}
