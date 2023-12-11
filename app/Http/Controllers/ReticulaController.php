<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materias;
use App\Models\Reticula;
use Illuminate\Http\Request;

class ReticulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtdescripcion;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $reticulas = Reticula::where('descripcion', 'like', $p1 . '%')->paginate(5);
        return view('reticulas.index', ['reticulas' => $reticulas, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $reticula = new reticula;
        $carrera = Carrera::all();
        

        return view('reticulas.formulario3',['reticula' => $reticula],compact('carrera'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reticulaValidada = request()->validate([
            'descripcion'=>'required', 
            'fechaenvigor'=>'required',
            'carrera_id' => 'required']);

        Reticula::create($reticulaValidada);
        return redirect()->route('reticulas.index')->with('mensaje', 'La reticula se INSERTO correctamente ');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Reticula $reticula)
    {
        return view('reticulas.show', ['reticula' => $reticula]);
    }

    /**
     * Show the form for editing the specified resource.
     */ 
    public function edit(Reticula $reticula)
    {
        $carrera = Carrera::get();
        return view('reticulas.formulario3', ['reticula' => $reticula, 'carrera' => $carrera]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reticula $reticula)
    {
        $reticulaValidada = request()->validate([
            'descripcion'=>'required', 
            'fechaenvigor'=>'required',
            'carrera_id' =>'required'
        ]);
        

        $reticula->update($reticulaValidada);
        return redirect()->route('reticulas.index')->with('mensaje', 'La reticula se ACTUALIZO correctamente ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reticula $reticula)
    {
        $reticula->delete();
        return redirect()->route('reticulas.index');
    }
}
