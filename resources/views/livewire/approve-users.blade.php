<div>
    @foreach ($unverified_users as $user)
        <hr>
        <p>{{$user['name']}}</p>
        <p>{{$user['birthdate']}}</p>
        <img style="height:250px;" src="/storage/{{$user->identification['identification_front_side_url']}}">
        <img style="height:250px;" src="/storage/{{$user->identification['identification_side_by_side_url']}}">
        
        <form wire:submit.prevent="submit">
            <div class="mt-4">


                {{-- <input type="text" maxlength="255" class="" wire:model="who"  value="{{$user['id']}}" > --}}
                <input class="form-checkbox" wire:model="approval" type="checkbox" value="{{$user->id}}">
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" >
                {{ __('Update User Approval Status') }}
            </button>
            </div>
        </form>
        <hr>
    @endforeach

    {{ $unverified_users->links() }}
</div>
