<x-app-layout>

    <form action="" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> 
        <h2 class="text-center mb-4" style="background: black; color: white; text-align: center; border-radius: 15px; padding: 5px;"><b>Datos Del Equipo</b></h2>
        <div class="mb-4">
            <x-label>
                No. Serial
            </x-label>
            <x-input  class="w-full mb-4" readonly value="{{$historial->equipos->serial}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Marca
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$historial->equipos->marca}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Modelo
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$historial->equipos->equipo}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Proveedor
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$historial->equipos->proveedor}}"/>
        </div>
        <h2 class="text-center mb-4" style="background: black; color: white; text-align: center; border-radius: 15px; padding: 5px;"><b>Informacion De Entrega</b></h2>
        <div class="mb-4">
            <x-label>
                Fecha De Entrega
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$historial->equipos->created_at}}"/>
        </div>
        <div class="mb-4">
            <x-label>
                Recibe
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$historial->recibe}}"/>
        </div>

        @if ($historial->observacion_entrada===null)
            <x-label>
                No Vedades
            </x-label>
            <x-input class="w-full mb-4" readonly value="NO HUVO"/>
        @else
            <div class="mb-4">
                <x-label>Observaciones Del Equipo</x-label>
                <textarea  cols="" rows="4"
                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{$historial->observacion_entrada}}</textarea>
            </div>        
        @endif

        <div class="mb-4">
            <x-label>
                Tec Que Entrega
            </x-label>
            <x-input class="w-full mb-4" readonly value="{{$historial->user->name}}"/>
        </div>

        @if ($historial->estado==0)
            <h2 class="text-center mb-4" style="background: black; color: white; text-align: center; border-radius: 15px; padding: 5px;"><b>Datos Del historial</b></h2>

            <div class="mb-4">
                <x-label>
                    Quien Entrega
                </x-label>
                <x-input  class="w-full mb-4" readonly value="{{$historial->entrega}}" />
            </div>

            <div class="mb-4">
                <x-label>
                    Observaciones 
                </x-label>
                <x-input  readonly class="w-full mb-4" value="{{$historial->observacion_salida}}" />
            </div>

            <div class="mb-4">
                <x-label>
                    Tec Que Recibe
                </x-label>
                <x-input  class="w-full mb-4" readonly value="{{$historial->tc_recibe}}" />
            </div>

            <div class="mb-4">
                <x-label>
                    Fecha Retiro
                </x-label>
                <x-input  class="w-full mb-4" readonly value="{{$historial->fecha_salida}}" />
            </div>

        @else
            <h2 class="text-center mb-4" style="background: rgb(0, 143, 33); color: white; text-align: center; border-radius: 15px; padding: 5px;"><b>EQUIPO ACTIVO</b></h2>
        @endif
    </form>
</x-app-layout>