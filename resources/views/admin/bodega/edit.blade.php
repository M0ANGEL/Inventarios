<x-app-layout>

    <form action="{{route('bodegas.update',$bodega)}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
            name="name"
            class="w-full" 
            placeholder="Escriba el nombre de la bodega" value="{{old('title',$bodega->name)}}" required />
        </div>
        
        {{-- <div class="mb-4">
            <input type="hidden" value="0" name="published">


            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="1" 
                name="published" class="sr-only peer"
                @checked(old('publishe',$post->published == 1))>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-black-300">
                    @if ($post->published==1){
                        {{ "bodega activa" }} 
                    }
                    @else{
                        {{"bodega cerrada"}}
                    }
                    @endif
                </span>
            </label>
        </div> --}}
  
        <div class="flex justify-end">
            
            <x-danger-button class="mr-2" onclick="deleteBodega()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- form de delete --}}
    <form action="{{route('bodegas.destroy', $bodega)}}" 
    method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteBodega(){
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush

  
</x-app-layout>