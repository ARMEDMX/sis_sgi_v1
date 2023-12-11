<?php

namespace App\Http\Controllers;

use App\Models\Puestos;
use Illuminate\Http\Request;

class PuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtnombre;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $puestos = Puestos::where('nombre', 'like', $p1 . '%')->paginate(5);
        return view('puestos.index', ['puestos' => $puestos, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puesto = new Puestos;
        return view('puestos.formulario3',['puesto' => $puesto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $puestoValidado = request()->validate([
            'nombre'=>'required', 
            'tipo'=>'required', 
        ]);
       

        Puestos::create($puestoValidado);
        return redirect()->route('puestos.index')->with('mensaje', 'El puesto se INSERTO correctamente'. request()->nombre);
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Puestos $puesto)
    {
        return view('puestos.show', ['puesto'=>$puesto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puestos $puesto)
    {
        return view('puestos.formulario3',['puesto'=>$puesto]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puestos $puesto)
    {
        
        $puestoValidado = request()->validate([
            'nombre'=>'required', 
            'tipo'=>'required', 
        ]);

        $puesto->update($puestoValidado);
        return redirect()->route('puestos.index')->with('mensaje', 'El puesto se ACTUALIZO correctamente ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puestos $puesto)
    {
        $puesto->delete();
        return redirect()->route('puestos.index');
    }
}
