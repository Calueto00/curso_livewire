<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
    <div class="flex">
        <h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New Account</h2>
    </div>
    @if (session('success'))
       <span class="px-3 py-3 bg-green-600 rounded">
            {{session('success')}}
        </span>

    @endif
    <form class="p-5" wire:submit="create" action="">
        <label for="name" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Name</label>
        <input id="name" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded w-full" type="text" wire:model="name" placeholder="name">
            @error('name')
                <span class="text-red-500 text-xs">
                    {{$message}}
                </span>
            @enderror
            <label for="email" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Email</label>
        <input id="email" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded w-full" type="email" wire:model="email" placeholder="email">
            @error('email')
                <span class="text-red-500 text-xs">
                    {{$message}}
                </span>
             @enderror
             <label for="password" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Password</label>
        <input id="password" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded w-full" type="password" wire:model="password" placeholder="password">
        @error('password')
        <span class="text-red-500 text-xs">
            {{$message}}
        </span>
    @enderror
    <label for="image" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Profile Picture</label>
    <input wire:model="image" type="file" accept="image/png, image/jpeg" id="image">
    @error('image')
    <span class="text-red-500 text-xs">
        {{$message}}
    </span>
@enderror
@if ($image)
            <img src="{{$image->temporaryUrl()}}" alt="" class="rounded w-10  h-10 mt-5 block">
    @endif

    <div wire:loading wire:target="image">
        <span class="text-green-500">Uploading...</span>
    </div>

    <div wire:loading>
        <span class="text-green-500">Sending</span>
    </div>

        <button wire:loading.remove class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600" >Create</button>
    </form>

</div>
