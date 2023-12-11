<?php

namespace App\Http\Controllers;

use App\Models\Plazas;
use Illuminate\Http\Request;

class PlazasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtnombrePlaza;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $plazas = Plazas::where('nombrePlaza', 'like', $p1 . '%')->paginate(5);
        return view('plazas.index', ['plazas' => $plazas, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plaza = new Plazas;
        return view('plazas.formulario3',['plaza' => $plaza]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plazaValidado = request()->validate([
            'nombrePlaza'=>'required', 
        ]);
       

        Plazas::create($plazaValidado);
        return redirect()->route('plazas.index')->with('mensaje', 'La Plaza se INSERTO correctamente');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Plazas $plaza)
    {
        return view('plazas.show', ['plaza'=>$plaza]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plazas $plaza)
    {
        return view('plazas.formulario3',['plaza'=>$plaza]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plazas $plaza)
    {
        $plazaValidado = request()->validate([
            'nombrePlaza'=>'required', 
        ]);

        $plaza->update($plazaValidado);
        return redirect()->route('plazas.index')->with('mensaje', 'La Plaza se ACTUALIZO correctamente ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plazas $plaza)
    {
        $plaza->delete();
        return redirect()->route('plazas.index');
    }
}
