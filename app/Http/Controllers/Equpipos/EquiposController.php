<?php

namespace App\Http\Controllers\Equpipos;

use App\Http\Controllers\Controller;
use App\Models\equipos\Equipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquiposController extends Controller
{
   
    public function index()
    {
        $equipos = Equipos::orderBy('id','desc')->paginate(15);
        return view('equipos.index',compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial'=>'required',
            'marca'=>'required',
            'equipo'=>'required',
            'proveedor'
        ]);

        Equipos::create([
            'serial'=>$request->serial,
            'marca'=>$request->marca,
            'equipo'=>$request->equipo,
            'proveedor'=>$request->proveedor,
            'users_id'=> Auth::id(),
        ]);

        session()->flash('swal',[
            'icon' => 'succes',
            'title'=>'Bien hecho',
            'text'=>'El equipo se creo correctamente',
        ]);

        return redirect()->route('equipos.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipos $equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipos $equipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipos $equipos)
    {
        //
    }
}
