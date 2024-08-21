@php
    $indicadores = [
         /*  registrar indicadores*/
        [
            'name' => 'Clientes Alquiler Activos',
            'url' => route('graficoActivos.index'),
            'active' => request()->routeIs('graficoActivos.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'manejo_eventos',
        ],
        /* adsdsd */
        [
            'name' => 'Clientes DVMS',
            'url' => route('grafcosInactivos.index'),
            'active' => request()->routeIs('grafcosInactivos.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'manejo_eventos',
        ],

    ];

    $links = [

        /* nuevos usuarios*/
        [
            'name' => 'Registro Equipos',
            'url' => route('equipos.create'),
            'active' => request()->routeIs('equipos.create'),
            'icon' => 'fa-solid fa-laptop',
            'can' => 'admin_usuarios',
        ],
        /* entraga de equipos usuarios*/
        [
            'name' => 'Entrega De Equipos',
            'url' => route('entrega.create'),
            'active' => request()->routeIs('entrega.create'),
            'icon' => 'fa-solid fa-truck-fast',
            'can' => 'admin_usuarios',
        ],
        /* retiro de equipos usuarios*/
        [
            'name' => 'Retiro De Equipos',
            'url' => route('retiros.index'),
            'active' => request()->routeIs('retiros.index'),
            'icon' => 'fa-regular fa-bell',
            'can' => 'admin_usuarios',
        ],
         /* historial de equipo*/
         [
            'name' => 'Historial De Equipos',
            'url' => route('historial.index'),
            'active' => request()->routeIs('historial.index'),
            'icon' => 'fa-regular fa-folder',
            'can' => 'admin_usuarios',
        ],
         /* administrar nuevos usuarios*/
         [
            'name' => 'Administrar Registro Equipos',
            'url' => route('equipos.index'),
            'active' => request()->routeIs('equipos.index'),
            'icon' => 'fa-solid fa-laptop',
            'can' => 'admin_usuarios',
        ],
         /* administrar empresas*/
        [
            'name' => 'Administrar Clientes',
            'url' => route('clientes.index'),
            'active' => request()->routeIs('clientes.index'),
            'icon' => 'fa-solid fa-globe',
            'can' => 'admin_usuarios',
        ],
        /* nuevos usuarios*/
        [
            'name' => 'Administrar Usuarios SB',
            'url' => route('users.index'),
            'active' => request()->routeIs('users.*'),
            'icon' => 'fa-solid fa-users',
            'can' => 'admin_usuarios',
        ],

        /* roles*/
        [
            'name' => 'Roles',
            'url' => route('roles.index'),
            'active' => request()->routeIs('roles.*'),
            'icon' => 'fa-solid fa-gear',
            'can' => 'crear_roles',
        ],
        /* permisos*/
        [
            'name' => 'Permisos',
            'url' => route('permissions.index'),
            'active' => request()->routeIs('permissions.*'),
            'icon' => 'fa-solid fa-key',
            'can' => 'crear_permisos',
        ],

        /* cambiar contra*/
        [
            'name' => 'Cambiar Password',
            'url' => route('cambio.index'),
            'active' => request()->routeIs('cambio.*'),
            'icon' => 'fa-solid fa-unlock-keyhole',
        ],
    ];
@endphp

<style>
    #super:hover{
        background: rgb(26, 142, 219);
        border-radius: 10px;
    }

    #sub:hover{
        background: rgb(46, 62, 72);
        border-radius: 10px;
    }

    #subMenu:hover{
        width: 230px;
    }


</style>

<aside id="cta-button-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" 
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto  dark:bg-gray-50" style="background: #09257f;">

        <ul class="space-y-2 font-medium">
            {{-- botton que activa el menu de los indicador --}}
            <li id="sub">
                <button type="button" id="subMenu" style="text-align: center; padding-right: 10px"
                 class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
                    <i class="fa-solid fa-signal"></i>
                    <span class="ms-3 items-center"  >Indicadores</span>
                    <span class="ml-4"><i class="fa-solid fa-caret-down"></i></span>
                </button>
                <ul style="display: none;" id="sub_menu" class="space-y-2 font-medium">
                    @foreach ($indicadores as $indicador)
                    {{--  @canany($link['can'] ?? [null]) --}}
                    <li>
                        <a href="{{ $indicador['url'] }}" {{-- style="background: rgb(223, 39, 39); --}} 
                            class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group  {{ $indicador['active'] ? 'bg-blue-500' : '' }}">
                            <i class="{{ $indicador['icon'] }}"></i>
                            <span class="ms-3">{{ $indicador['name'] }}</span>
                        </a>
                    </li>
                    {{-- @endcanany  --}}
                    @endforeach
                </ul>                
            </li>

            @foreach ($links as $link)
                {{--  @canany($link['can'] ?? [null]) --}}
                <li>
                    <a id="super" href="{{ $link['url'] }}"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white  dark:hover:bg-gray-700 group  {{ $link['active'] ? 'bg-red-500' : '' }}">
                        <i class="{{ $link['icon'] }}"></i>
                        <span class="ms-3">{{ $link['name'] }}</span>
                    </a>
                </li>
                {{-- @endcanany  --}}
            @endforeach
        </ul>
    </div>
</aside>

@push('js')
<script>
    /* vista */
    document.addEventListener('DOMContentLoaded', function() {
        var sub_menu = document.getElementById('sub_menu');
        var subMenu = document.getElementById('subMenu');

        subMenu.addEventListener('click', function() {
            sub_menu.style.display = 'block'; // mostrar el formulario
        });
    });
</script>
@endpush

 