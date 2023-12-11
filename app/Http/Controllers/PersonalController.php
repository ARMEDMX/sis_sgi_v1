<?php

namespace App\Http\Controllers;

use App\Models\Deptos;
use App\Models\Personal;
use App\Models\Puestos;
use Illuminate\Http\Request;

class PersonalController extends Controller
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
        
        $personals = Personal::with('deptos', 'puestos')->where('Nombres', 'like', $p1 . '%')->paginate(5);
        return view('personals.index', ['personals' => $personals, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personal = new Personal;
        $deptos = Deptos::get();
        $puestos = Puestos::get();

        return view('personals.formulario3',['personal' => $personal, 'deptos' => $deptos, 'puestos' => $puestos ]);
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personalValidado = request()->validate([
            'RFC' => [
                'required',
                'regex:/^[A-Z&Ñ]{3,4}\d{6}[A-Z0-9]{3}$/',
                'max:13',
            ], 
            'Nombres'=>'required',
            'apellidoP'=> 'required',
            'apellidoM'=> 'required',
            'licenciatura'=> 'required',
            'licPasTit'=> 'required|string|size:1',
            'especializacion'=> 'required',
            'espPasTit'=> 'required|string|size:1',
            'maestria'=> 'required',
            'maePasTit'=> 'required|string|size:1',
            'doctorado'=> 'required',
            'docPasTit'=> 'required|string|size:1',
            'deptos_id'=> 'required',
            'fechaIngSep'=> 'required',
            'fechaIngIns'=> 'required',
            'puestos_id'=> 'required',
        ]);
       
        
        Personal::create($personalValidado);
        return redirect()->route('personal.index')->with('mensaje', 'El Personal se INSERTO correctamente ');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        return view('personals.show', ['personal' => $personal]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        $deptos = Deptos::get();
        $puestos = Puestos::get();

        return view('personals.formulario3',['personal' => $personal, 'deptos' => $deptos, 'puestos' => $puestos ]);
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        $personalValidado = request()->validate([
            'RFC' => [
                'required',
                'regex:/^[A-Z&Ñ]{3,4}\d{6}[A-Z0-9]{3}$/',
                'max:13',
            ], 
            'Nombres'=>'required',
            'apellidoP'=> 'required',
            'apellidoM'=> 'required',
            'licenciatura'=> 'required',
            'licPasTit'=> 'required|string|size:1',
            'especializacion'=> 'required',
            'espPasTit'=> 'required|string|size:1',
            'maestria'=> 'required',
            'maePasTit'=> 'required|string|size:1',
            'doctorado'=> 'required',
            'docPasTit'=> 'required|string|size:1',
            'deptos_id'=> 'required',
            'fechaIngSep'=> 'required',
            'fechaIngIns'=> 'required',
            'puestos_id'=> 'required',
        ]);
       
        $personal->update($personalValidado);
        return redirect()->route('personal.index')->with('mensaje', 'El personal se ACTUALIZO correctamente ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route('personal.index');
    }
}
