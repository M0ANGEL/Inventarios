<x-app-layout>

    <form action="{{route('clientes.update',$cliente)}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Cliente
            </x-label>
            <x-input 
            name="name" class="w-full" 
            placeholder="Escriba el nombre de la bodega" value="{{$cliente->name}}" required  />
        </div>
        <div class="flex justify-end">
            <x-danger-button class="mr-2" onclick="deleteCliente()">
                Eliminar
            </x-danger-button>
            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- form de delete --}}
    <form action="{{route('clientes.destroy', $cliente)}}" 
    method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteCliente(){
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush

</x-app-layout>