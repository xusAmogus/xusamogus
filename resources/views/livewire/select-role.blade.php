<div>
    
    <select wire:model="role" wire:change="updateRole($event.target.value)">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{$role->name}}</option>
            @endforeach        
    </select>
    <div>size: @json($role)</div>
</div>

