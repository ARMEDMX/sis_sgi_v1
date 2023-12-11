<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lugares;

class LugaresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $p1 = '%'.request()->txtnombrelugar. '%';
        // $Lugar = Lugares::Where('nombreLugar','like',$p1)->paginate(10);
        // return view('lugares.index',['Lugar'=>$Lugar]);
        $input = request()->txtnombrelugar;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $Lugar = Lugares::where('nombreLugar', 'like', $p1 . '%')->paginate(5);

        foreach ($Lugar as $lugar){
            $lugar->edificio = $this->convertirEdificio($lugar->edificio);
        }

        return view('lugares.index', ['Lugar' => $Lugar]);    
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Lugares = new lugares;

        return view('lugares.formulario3',['Lugares' => $Lugares]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lugarValidado = request()->validate([
            'nombreLugar'=>'required', 
            'descripcion'=>'required', 
            'edificio'=>'required']);

        Lugares::create($lugarValidado);
        return redirect()->route('lugares.index')->with('mensaje', 'El lugar se INSERTO correctamente ' . request()->nombreLugar);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Lugares $Lugares)
    {
        return view('lugares.show', ['Lugares' => $Lugares]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lugares $Lugares)
    {
        return view('lugares.formulario3',['Lugares'=>$Lugares]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lugares $Lugares)
    {
        $lugarValidado = request()->validate([
            'nombreLugar'=>'required', 
            'descripcion'=>'required', 
            'edificio'=>'required'
        ]);
        

        $Lugares->update($lugarValidado);
        return redirect()->route('lugares.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugares $Lugares)
    {
        

        $Lugares->delete();
        return redirect()->route('lugares.index');
    }

    public function convertirEdificio($numero)
    {
        $nombres_edificios = [
            0 => 'Edificio Electronica',
            1 => 'Edificio Sistemas',
            2 => 'Edificio Mecatronica',
            3 => 'Edificio Industrial',
            4 => 'Edificio Mecanica',
            5 => 'Edificio Abogaduria',
            6 => 'Edificio Fotografia',
            7 => 'Edificio Programacion',
            8 => 'Edificio Mecanografia',
            10 => 'Edificio Canografia',

        ];

        if ($numero >= 10) {
            return 'Edificio Desconocido';
        }
    

        return isset($nombres_edificios[$numero]) ? $nombres_edificios[$numero] : 'Edificio Desconocido';
    }
}