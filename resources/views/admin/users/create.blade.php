<x-app-layout>
    <form action="{{route('users.store')}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            name="name"
            class="w-full" 
            placeholder="Nombre completo" required/>
        </div>
        <div class="mb-4">
            <x-label>
                Correo
            </x-label>
            <x-input 
            name="email"
            class="w-full" 
            placeholder="Correo" required/>
        </div>
                      
        <div class="mb-4">
            <x-label>
                Password
            </x-label>
            <x-input 
            name="password"
            type="password"
            class="w-full" 
            placeholder="Password" required/>
        </div>
        <div class="flex justify-end">
            <x-button>
                Crear
            </x-button>
        </div>
    </form>
</x-app-layout>