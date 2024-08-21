<?php

namespace App\Http\Controllers\graficos;

use App\Http\Controllers\Controller;
use App\Models\Registro\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoActivosController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el rango de fechas de los parámetros de la solicitud
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Consultar los registros filtrados por estado y rango de fechas
        $datos = Registro::select('empresa', DB::raw('COUNT(equipos_id) as cantidad'))
            ->where('estado', 1)
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->groupBy('empresa')
            ->orderBy('cantidad', 'desc') // Opcional: Ordenar por cantidad descendente
            ->get();

        return view('graficos.index', compact('datos'));
    }

}
