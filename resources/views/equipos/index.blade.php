<x-app-layout>    
    <style>
        #filas:hover{
            background: rgb(234, 242, 248)
        }

        #marco{
            border: 2px solid #BDC3C7 
        }
    </style>
    
<div id="marco" class="relative overflow-x-auto " style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800" style="border: rgb(189, 195, 199)">
        <thead class="text-xs text-gray-50 uppercase  dark:bg-gray-700 dark:text-white-400" style="background: rgb(52, 73, 94);">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Creador
                </th>
                <th scope="col" class="px-6 py-3">
                    Serial
                </th>
                <th scope="col" class="px-6 py-3">
                    Marca
                </th>
                <th scope="col" class="px-6 py-3">
                    Modelo Equipo
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Creacion
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($equipos as $equipo) 
                <tr id="filas" class=" border-b dark:bg-gray-800 dark:border-gray-700" style="color: rgb(44, 62, 80)">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$equipo->id}}
                    </th>
                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white" style="color: rgb(44, 62, 80)">
                        {{ $equipo->user ? $equipo->user->name : 'Usuario no encontrado' }}
                    </td>
                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white" style="color: rgb(44, 62, 80)">
                        {{$equipo->serial}}
                    </td>
                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white" style="color: rgb(44, 62, 80)">
                        {{$equipo->marca}}
                    </td>
                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white" style="color: rgb(44, 62, 80)">
                        {{$equipo->equipo}}
                    </td>
                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white" style="color: rgb(44, 62, 80)">
                        {{$equipo->created_at}}
                    </td>
                   
                </tr>
            @endforeach 
        </tbody>
        
    </table>
   
</div>
<div class="mt-8">
    {{$equipos->links()}}
</div> 


<script>
    function estado(){
        alert('No se puede editar, el usuario ya fue creado');
    }
</script>
   
</x-app-layout>