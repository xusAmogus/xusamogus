<div>
    <div class="fixed top-0 left-0 px-6 py-4 text-4xl text-slate-400 flex justify-content-center algin-items-center">
        <form>
            @if (Route::has('login'))
            
            @auth
                <button class="text-center  dark:bg-gray-800 p-4 rounded hover:bg-slate-600 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-300" formaction="{{ url('dashboard') }}">Dashboard</button>              
            @else
                <button class="text-center  dark:bg-gray-800 p-4 rounded hover:bg-slate-600 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-300" formaction="{{ route('login') }}">Login</button>
            @if (Route::has('register'))
                <button class="text-center  dark:bg-gray-800 p-4 rounded hover:bg-slate-600 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-300" formaction="{{ route('register') }}">Register</button>
            @endif                    
            @endauth
        
            @endif
            <button type="button" class="text-center dark:bg-gray-800 p-4 rounded hover:bg-slate-600 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-300 mr-2" wire:click="$emit('toggle')">Blog</button>
            <button type="button" class="text-center dark:bg-gray-800 p-4 rounded hover:bg-slate-600 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-300" wire:click="test">Archives</button>
            <input class="text-center dark:bg-gray-800 p-4 rounded hover:bg-slate-600 active:bg-slate-700 focus:outline-none focus:ring focus:ring-slate-300 text-4xl" name="search" type="search" placeholder="Search"  wire:model="searchTerm">
        </form>
    </div>
</div>
