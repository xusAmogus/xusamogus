<x-app-layout>
    <x-slot name="header">
        @livewire('menu')
    </x-slot>
    
    <x-slot name="main">
        @livewire('permissions')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @can('view schedule')
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showDropZone()">upload excel bestand</button>
                    <livewire:schedule-table model="App\Models\Schedule" name="schedule" exclude="id,created_at, updated_at"/>
                    @endcan
                </div>
                
                    <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                        class="hidden dropzone" id="dropzone">
                    @csrf
                    </form>
                
            </div>
        </div>
    </x-slot>
    
    <script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.xslx",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
        };

        function showDropZone() {
            const el = document.querySelector("#dropzone");
            el.style.display = "block";
        }
    </script>
  
</x-app-layout>
