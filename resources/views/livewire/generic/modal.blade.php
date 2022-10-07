<div>
    <x-jet-confirmation-modal wire:model="showModal">
        
        <x-slot name="title" wire:model="blog">
            {{ $blog ? $blog['title'] : ''}}
        </x-slot>

        <x-slot name="content" wire:model="blog">
            {{ $blog ? $blog['content'] : ''}}
        </x-slot>

        <x-slot name="footer">
            Last change: {{ $blog ? $blog['updated_at']: ''}}
            <x-jet-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                close
            </x-jet-secondary-button>
            @if(Auth::user() && Auth::user()->hasRole('admin') && $blog !== null)
            <x-jet-secondary-button wire:model="blog" wire:click="$emit('deleteBlog',{{ $blog['id']}})" wire:loading.attr="disabled">
                delete
            </x-jet-secondary-button>
            @endif
        </x-slot>        
        
    </x-jet-confirmation-modal>
    
</div>
