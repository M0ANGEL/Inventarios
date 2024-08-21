<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Empresa::orderBy('id','desc')->paginate(15);
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Empresa::create($request->all());

        session()->flash('swal',[
            'icon' => 'succes',
            'title'=>'Bien hecho',
            'text'=>'El cliente se creo correctamente',
        ]);

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $cliente)
    {
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $cliente)
    {
        $request->validate([
            'name'=>'required',
        ]);
      
        $cliente->update($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'El cliente se actualizo corretamente',
        ]);

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $cliente)
    {
        $cliente->delete();
         
        session()->flash('swal',[
        'icon'=>'success',
        'title'=>'¡Bien hecho!',
        'text'=>'El cliente se elimino correctamente'
        ]);

        return redirect()->route('clientes.index');
    }
}
