<?php

namespace App\Http\Controllers;

use App\Models\Periodos;
use App\Models\Puestos;
use Illuminate\Http\Request;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtperiodo;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $periodos = Periodos::where('periodo', 'like', $p1 . '%')->paginate(5);
        return view('periodos.index', ['periodos' => $periodos, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodo = new Periodos;
        return view('periodos.formulario3',['periodo' => $periodo]);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $periodoValidado = request()->validate([
            'periodo'=>'required', 
            'descCorta'=>'required', 
            'fechaIni'=>'required',
            'fechaFin'=>'required',
        ]);
       

        Periodos::create($periodoValidado);
        return redirect()->route('periodos.index')->with('mensaje', 'El periodo se INSERTO correctamente ');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodos $periodo)
    {
        return view('periodos.show', ['periodo'=>$periodo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodos $periodo)
    {
        return view('periodos.formulario3',['periodo'=>$periodo]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periodos $periodo)
    {
        $periodoValidado = request()->validate([
            'periodo'=>'required', 
            'descCorta'=>'required', 
            'fechaIni'=>'required',
            'fechaFin'=>'required',
        ]);
            
            
    
        $periodo->update($periodoValidado);
        return redirect()->route('periodos.index')->with('mensaje', 'El periodo se ACTUALIZO correctamente ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodos $periodo)
    {
        $periodo->delete();
        return redirect()->route('periodos.index');
    }
}
