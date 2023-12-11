<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use App\Models\HorariosMaterias;
use App\Models\Materias;
use Illuminate\Http\Request;

class HorariosMateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtRFC;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $horariosmats = HorariosMaterias::where('materias_id', 'like', $p1 . '%')->paginate(5);

        return view('horariosmaterias.index', ['horariosmats' => $horariosmats]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $horariom = new HorariosMaterias;
        $materia = Materias::get();
        $horario = Horarios::get();
        
        return view('horariosmaterias.formulario3',['horariom' => $horariom, 'materia' => $materia, 'horario' => $horario]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $horariosmatValidados = request()->validate([
            'grupos'=>'required', 
            'totalEstudiantes'=>'required',
            'horarios_id'=> 'required',
            'tipoLugar'=> 'required',
            'materias_id'=> 'required',
            
            
        ]);

        
        HorariosMaterias::create($horariosmatValidados);
        return redirect()->route('horariosmaterias.index')->with('mensaje', 'El horario de materia se INSERTO correctamente ');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(HorariosMaterias $horariosMaterias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HorariosMaterias $horariosMaterias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HorariosMaterias $horariosMaterias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HorariosMaterias $horariosMaterias)
    {
        //
    }
}
