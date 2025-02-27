<x-app-layout>

    <form action="{{route('users.update',$user)}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
        @csrf

        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            name="name"
            class="w-full" 
            placeholder="Escriba el nombre de la bodega" value="{{$user->name}}" required />
        </div>
        <div class="mb-4">
            <x-label>
                Email
            </x-label>
            <x-input 
            name="email"
            class="w-full" 
            placeholder="Escriba el nombre de la bodega" value="{{$user->email}}" required />
        </div>
        
        <div class="mb-4">
            <x-label>
                Paswoord
            </x-label>
            <x-input 
            name="password"
            type="password"
            class="w-full" 
            placeholder="Escriba password"  />
        </div>
       
        <div class="mb-4">
            <ul>
                @foreach ($roles as $role)
                    <li>
                        <label>
                            <x-checkbox
                            name="roles[]"
                            value="{{$role->id}}"
                            :checked="in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()))"
                            />
                            {{$role->name}}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
       
        <div class="flex justify-end">
            
            <x-danger-button class="mr-2" onclick="deleteCategory()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- form de delete --}}
    <form action="{{route('users.destroy', $user)}}" 
    method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteCategory(){
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush

  
</x-app-layout>