<x-app-layout>

    <form action="" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> 
        <h2 class="text-center">Datos Del Equipo</h2>
        <div class="mb-4">
            <x-label>
                No. Serial
            </x-label>
            <x-input  class="w-full mb-4" readonly value="{{$registro->equipos->serial}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Marca
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$registro->equipos->marca}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Modelo
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$registro->equipos->equipo}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Proveedor
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$registro->equipos->proveedor}}"/>
        </div>
        <h2 class="text-center">Informacion De Entrega</h2>
        <div class="mb-4">
            <x-label>
                Fecha De Entrega
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$registro->equipos->created_at}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Recibe
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$registro->recibe}}"/>
        </div>

        @if ($registro->observacion_entrada===null)
            <x-label>
                No Vedades
            </x-label>
            <x-input class="w-full mb-4" readonly value="NO HUVO"/>
        @else
            <div class="mb-4">
                <x-label>Observaciones Del Equipo</x-label>
                <textarea  cols="" rows="4"
                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{$registro->observacion_entrada}}</textarea>
            </div>        
        @endif

        <div class="mb-4">
            <x-label>
                Entregado
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$registro->user->name}}"/>
        </div>

        <h2 class="text-center">Datos Del registro</h2>

        <div class="mb-4">
            <x-label>
                Quien Entrega
            </x-label>
            <x-input  class="w-full mb-4" readonly value="{{$registro->entrega}}" />
        </div>

        <div class="mb-4">
            <x-label>
                Observaciones 
            </x-label>
            <x-input  readonly class="w-full mb-4" value="{{$registro->observacion_salida}}" />
        </div>

    </form>
</x-app-layout>