<?php

namespace App\Http\Controllers\Historial;

use App\Http\Controllers\Controller;
use App\Models\Registro\Registro;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
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
            })->orderBy('id','desc')
            ->paginate(10);
            
    
        return view('historial.index', compact('datos', 'busqueda'));
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
    public function show(Registro $historial)
    {
        return view('historial.show',compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        //
    }
}
