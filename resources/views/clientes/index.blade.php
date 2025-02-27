<x-app-layout>    
    <div class="flex justify-end mb-4" >
        <a style="background: red; " class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
        href="{{route('clientes.create')}}"><b>CREAR CLIENTE</b></a>
    </div>
<div class="relative overflow-x-auto" style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800">
        <thead class="text-xs text-gray-50 uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Clientes
                </th>
                <th scope="col" class="px-6 py-3">
                    fecha Creacion
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($clientes as $cliente) 
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cliente->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$cliente->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$cliente->created_at}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('clientes.edit',$cliente)}}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
        
    </table>
   
</div>

<div class="mt-8">
    {{$clientes->links()}}
</div>
   
</x-app-layout>