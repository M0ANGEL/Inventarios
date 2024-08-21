<x-app-layout>
    <style>
        /* Estilos */
        .buscar {
            margin: 50px 0 50px 340px;
            margin-bottom: 30px;
        }

        .barra {
            width: 500px;
            border-radius: 10px;
            padding: 10px;
            border: solid 2px #111827;
        }

        .btn-buscar {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: #111827;
            color: aliceblue;
        }

        .btn-buscar:hover {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: aliceblue;
            border: 3px solid #111827;
            color: #111827;
        }
    </style>

    <form action="{{ route('entrega.create') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>

    @if (count($datos)<=0)

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">No hay registro para este serial o esta en uso.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>

    @else
        <form action="{{ route('entrega.store') }}" method="POST" class="bg-white rounded-lg p-6 shadow-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 1); ">
            @csrf

            <div class="mb-4">
                <x-label>Serial De Equipo</x-label>
                <x-select class="w-full" name="equipos_id">
                    @foreach ($datos as $dato)
                        <option value="{{ $dato->id }}">{{ $dato->serial }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>Cliente</x-label>
                <x-select class="w-full" name="empresa">
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->name }}">{{ $cliente->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>Persona Que Recibe</x-label>
                <x-input name="recibe" class="w-full mb-4" required />
            </div>

            <div class="mb-4">
                <x-label>Observaciones Del Equipo</x-label>
                <textarea name="observacion_entrada" cols="" rows="8"
                    class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
            </div>

            <div class="flex justify-end">
                <x-button>CREAR</x-button>
            </div>
        </form>

    @endif
</x-app-layout>
