<div>
    @if($open)
        <div class="my-24 text-3xl">
            @foreach($blogs as $blog)            
            <div class=" text-emerald-100 my-2 dark:bg-gray-800 sm:rounded-md p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                <div class="flex items-center justify-center w-100">
                    <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight ">{{ $blog->title }}</h5>
                        <p class="font-normal">{{ $blog->content }}</p><span class="place-self-end text-sm hover:text-emerald-100">{{ $blog->created_at }}</span>
                        <button wire:click="$emit('modalcontent', {{ $blog }})" type="button" class="px-6 py-2.5 bg-blue-600 font-medium text-xs leading-tight uppercase
                        rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                        active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        Read Details
                        </button>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    @endif
</div>
<livewire:generic.modal />

