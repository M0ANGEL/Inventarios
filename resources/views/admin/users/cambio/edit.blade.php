<x-app-layout>

    <form action="{{route('cambio.update',$cambio)}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
    <h1 style="color: blue" class="text-center mb-4 mp-4"><b>Cambiar Contraseña</b></h1>
        @csrf

        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            class="w-full"  value="{{$cambio->name}}" readonly  />
        </div>
       
        <div class="mb-4">
            <x-label>
                Contraseña
            </x-label>
            <x-input 
            name="password"
            type="password"
            class="w-full" 
            placeholder="Escriba nueva contraseña"  />
        </div>
       
        <div class="flex justify-end">
            <x-button>
                CAMBIAR CONTRASEÑA
            </x-button>
        </div>
    </form>

</x-app-layout>