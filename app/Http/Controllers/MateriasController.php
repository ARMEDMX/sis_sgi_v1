<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\Reticula;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtnombreMateria;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
    

        $materias = Materias::where('nombreMateria', 'like', $p1 . '%')->paginate(5);
        return view('materias.index', ['materias' => $materias, 'input' => $input]);
    }

    public function index2(){
        // $alumnos = Alumno::get();
        $materia = Materias::with('reticulas.carreras.depto')->paginate(1);
        return response()->json($materia);
    }

    
   
    public function create()
    {
        $materia = new Materias;
        $reticula = Reticula::get();

        return view('materias.formulario3',['materia' => $materia, 'reticula' => $reticula]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materiaValidada = request()->validate([
            'nombreMateria'=>'required', 
            'nivel'=>'required',
            'nombreMediano'=>'required',
            'nombreCorto'=>'required',
            'modalidad'=>'required',
            'reticula_id' => 'required'
            ]);

        Materias::create($materiaValidada);
        return redirect()->route('materias.index')->with('mensaje', 'La materia se INSERTO correctamente ');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Materias $materia)
    {
        return view('materias.show', ['materia' => $materia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materias $materia)
    {
        $reticula = Reticula::get();
        return view('materias.formulario3', ['materia' => $materia, 'reticula' => $reticula]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materias $materia)
    {
        $materiaValidada = request()->validate([
            'nombreMateria'=>'required', 
            'nivel'=>'required',
            'nombreMediano'=>'required',
            'nombreCorto'=>'required',
            'modalidad'=>'required',
            'reticula_id'=> 'required'
            ]);

        $materia->update($materiaValidada);
        return redirect()->route('materias.index')->with('mensaje', 'La materia se ACTUALIZO correctamente ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materias $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index');
    }
}
