<?php

namespace App\Http\Controllers\RegistroEq;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\equipos\Equipos;
use App\Models\Registro\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* $busqueda = $request->get('text','');
        
        /* busqueda de registros filtrada 

        $datos = Equipos::where('estado',0)
        ->select('serial','marca','equipo','users_id','proveedor')
        ->where('serial','like','%'.$busqueda.'%')
        /* ->orwhere('codigosebthi','like','%'.$busqueda.'%') 
        ->paginate(10);

        return view('registro.index', compact('datos','busqueda')); */
        
    }

    public function create(Request $request)
    {
        $busqueda = $request->get('text', ''); // Proporciona un valor por defecto si 'text' no está presente

        // Ejecuta la consulta para obtener los datos
        $datos = Equipos::where('estado',0)->select('id', 'serial')
            ->where('serial', 'like', '%' . $busqueda . '%')
            ->get(); // Asegúrate de ejecutar la consulta

        // Obtén todos los clientes
        $clientes = Empresa::all();
        /* return $datos; */

        // Pasa los datos a la vista
        return view('registro.create', compact('datos', 'clientes', 'busqueda'));
    }


    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'empresa' => 'required',
            'equipos_id' => 'required',
            'recibe' => 'required',
            'observacion_entrada',
            'estado',
        ]);
    
        // Crear el nuevo registro en la tabla Registro
        $registro = Registro::create([
            'empresa' => $request->empresa,
            'equipos_id' => $request->equipos_id,
            'recibe' => $request->recibe,
            'observacion_entrada' => $request->observacion_entrada,
            'users_id' => Auth::id(),
        ]);
    
        // Obtener el modelo Campo2 relacionado
        $campo2 = Equipos::find($request->equipos_id);

       /*  return $campo2; */
    
        // Verificar si el estado está en falso y actualizarlo a verdadero
        if ($campo2 && $campo2->estado === 0) {
            $campo2->estado = 1;
            $campo2->save();
        }
    
        // Mostrar un mensaje de éxito en la sesión
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'La entrega se creó correctamente',
        ]);
    
        // Redirigir a la ruta especificada
        return redirect()->route('entrega.create');
    }
    
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $entrega)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        //
    }
}
