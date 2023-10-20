<div>
    <form wire:submit="create" action="">
        <input type="text" wire:model="name" placeholder="name">
        <input type="email" wire:model="email" placeholder="email">
        <input type="password" wire:model="password" placeholder="password">

        <button >Create</button>
    </form>
    <hr>
    @foreach ($user as $users)
        <p>{{$users->name}}</p>

    @endforeach

</div>
