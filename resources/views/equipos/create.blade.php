<x-app-layout>

    <form action="{{route('equipos.store')}}" method="POST" 
        class="bg-white rounded-lg p-6 shadow-lg">
            @csrf
            <div class="mb-4">
                <x-label>
                    N. Serial
                </x-label>
                <x-input name="serial" class="w-full mb-4"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Marca
                </x-label>
                <x-input name="marca" class="w-full mb-4"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Proveedor
                </x-label>
                <x-select class="w-full" name="proveedor">    
                   <option value="zinko">Zinko</option>
                   <option value="integratyc">Integratyc</option>
                   <option value="etc">ETC</option>
                   <option value="etc">ETC</option>
                </x-select>
            </div>
            <div class="mb-4">
                <x-label>
                    Equipo
                </x-label>
                <x-select class="w-full" name="equipo">    
                   <option value="portatil">Portatil</option>
                   <option value="todoEnUno">Todo En Uno</option>
                   <option value="torre">Torre</option>
                   <option value="monitor">Monitor</option>
                </x-select>
            </div>

            <div class="flex justify-end">
                <x-button style="background: rgb(52, 152, 219);">
                    CREAR
                </x-button>
            </div>
        </form>  
</x-app-layout>