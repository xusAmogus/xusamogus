<div>
    @if($open)
        <div class="my-24 text-3xl">
            @foreach($blogs as $blog)            
            <div class="my-2 dark:bg-gray-800 sm:rounded-md p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                <div class="flex items-center justify-center">
                    <a href="#" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $blog->title }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $blog->content }}</p><span class="place-self-end text-sm hover:text-emerald-100">{{ $blog->created_at }}</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
