@php
    $fecha = now();
@endphp

<x-app-layout>

    <form action="{{route('retiros.update',$retiro)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        @csrf
        <h2 class="text-center">Datos Del Equipo</h2>
        <div class="mb-4">
            <x-label>
                N. Serial
            </x-label>
            <x-input  class="w-full mb-4" readonly value="{{$retiro->equipos->serial}}"/>
                <x-input  name="equipos_id" type="hidden" value="{{$retiro->equipos->id}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Marca
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$retiro->equipos->marca}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Modelo
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$retiro->equipos->equipo}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Proveedor
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$retiro->equipos->proveedor}}"/>
        </div>
        <h2 class="text-center">Informacion De Entrega</h2>
        <div class="mb-4">
            <x-label>
                Fecha De Entrega
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$retiro->equipos->created_at}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Recibe
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$retiro->recibe}}"/>
        </div>

        @if ($retiro->observacion_entrada===null)
            <x-label>
                No Vedades
            </x-label>
            <x-input class="w-full mb-4" readonly value="NO HUVO"/>
        @else
            <div class="mb-4">
                <x-label>Observaciones Del Equipo</x-label>
                <textarea name="observacion_entrada" cols="" rows="4"
                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{$retiro->observacion_entrada}}</textarea>
            </div>        
        @endif

        <div class="mb-4">
            <x-label>
                Entregado
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$retiro->user->name}}"/>
        </div>

        <h2 class="text-center">Datos Del Retiro</h2>

        <div class="mb-4">
            <x-label>
                Quien Entrega
            </x-label>
            <x-input name="entrega" class="w-full mb-4" required/>
        </div>

        <div class="mb-4">
            <x-label>
                Observaciones 
            </x-label>
            <x-input name="observacion_salida" class="w-full mb-4" />
        </div>

        {{-- recibe --}}
        <input name="tc_recibe"  type="hidden" value="{{$tc_recibe->name}}"/>

        {{-- estado --}}
        <input name="estado"  type="hidden" value="0"/>

        {{-- estado --}}
        <input name="fecha_salida"  type="hidden" value="{{$fecha}}"/>



        <div class="flex justify-end">
            <x-button style="background: red;">
                RETIRAR
            </x-button>
        </div>

    </form>
</x-app-layout>