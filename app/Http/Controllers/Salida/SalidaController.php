<?php

namespace App\Http\Controllers\Salida;

use App\Http\Controllers\Controller;
use App\Models\equipos\Equipos;
use App\Models\Registro\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->get('text');
    
        /* busqueda de registros filtrada */
        $datos = Registro::query()
            ->with(['user', 'equipos']) // Asegúrate de incluir relaciones si es necesario
            ->where(function ($query) use ($busqueda) {
                $query->where('equipos_id', 'like', '%' . $busqueda . '%')
                      ->orWhere('empresa', 'like', '%' . $busqueda . '%')
                      ->orWhereHas('user', function ($query) use ($busqueda) {
                          $query->where('name', 'like', '%' . $busqueda . '%');
                      })
                      ->orWhereHas('equipos', function ($query) use ($busqueda) {
                          $query->where('serial', 'like', '%' . $busqueda . '%');
                      });
            })->where('estado','=',1)
            ->paginate(10);
    
        return view('retiro.index', compact('datos', 'busqueda'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $retiro)
    {
        $tc_recibe = Auth::user();
        return view('retiro.edit',compact('retiro','tc_recibe'));
    }

    public function update(Request $request, Registro $retiro)
    {
        // Validar los datos de entrada
        $request->validate([
            'entrega' => 'required',
            'tc_recibe' => 'required',
            'estado'=>'required|boolean',
            'equipos_id'=>'required',
            'fecha_salida' => 'required|date',
            'observacion_salida',
        ]);
    
        // Obtener el ID del equipo relacionado
        $equipos_id = $retiro->equipos_id;
    
        // Actualizar el registro
        $retiro->update($request->all());
    
        // Obtener el modelo Equipos relacionado
        $campo2 = Equipos::find($equipos_id);
    
        // Verificar si el estado está en verdadero y actualizarlo a falso
        if ($campo2 && $campo2->estado == 1) {
            $campo2->estado = 0; // Cambiar el estado según lo necesario
            $campo2->save();
        }
    
        // Mostrar un mensaje de éxito en la sesión
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El retiro fue actualizado',
        ]);
    
        // Redirigir a la ruta especificada
        return redirect()->route('retiros.index');
    }
    


    public function destroy(Registro $registro)
    {
        //
    }
}
