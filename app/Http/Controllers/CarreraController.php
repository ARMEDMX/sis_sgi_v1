<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Deptos;
use App\Models\Reticula;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtnombrecorto;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $carreras = Carrera::where('nombrecorto', 'like', $p1 . '%')->paginate(5);

        return view('carreras.index', ['carreras' => $carreras]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carrera = new Carrera;
        $depto = Deptos::get();
        
        return view('carreras.formulario3',['carrera' => $carrera, 'depto' => $depto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carreraValidada = request()->validate([
            'nombre'=>'required', 
            'nombrecorto'=>'required',
            'deptos_id'=> 'required']);

        
        Carrera::create($carreraValidada);
        return redirect()->route('carreras.index')->with('mensaje', 'La carrera se INSERTO correctamente ');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
    
        return view('carreras.show', ['carrera' => $carrera]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        $depto = Deptos::get();
        return view('carreras.formulario3', ['carrera' => $carrera, 'depto' => $depto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $carreraValidada = request()->validate([
            'nombre'=>'required', 
            'nombrecorto'=>'required',
            'deptos_id' => 'required'
        ]);
        

        $carrera->update($carreraValidada);
        return redirect()->route('carreras.index')->with('mensaje', 'La carrera se ACTUALIZO correctamente ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('carreras.index');
    }
}
