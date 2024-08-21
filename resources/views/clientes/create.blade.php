<x-app-layout>

    <form action="{{route('clientes.store')}}" method="POST" 
        class="bg-white rounded-lg p-6 shadow-lg">
            @csrf
            <div class="mb-4">
                <x-label>
                   Cliente
                </x-label>
                <x-input name="name" class="w-full mb-4"/>
            </div>
            <div class="flex justify-end">
                <x-button>
                    CREAR
                </x-button>
            </div>
    </form>  
</x-app-layout>