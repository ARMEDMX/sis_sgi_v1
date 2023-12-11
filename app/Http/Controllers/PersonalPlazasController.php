<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\PersonalPlazas;
use App\Models\Plazas;
use App\Models\Puestos;
use Illuminate\Http\Request;

class PersonalPlazasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtrfc;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $personalplazas = PersonalPlazas::with('plazas')
    ->whereHas('personal', function ($query) use ($p1) {
        $query->where('RFC', 'like', $p1 . '%');
    })
    ->orderBy('id', 'asc')
    ->paginate(5);
        return view('personalplazas.index', ['personalplazas' => $personalplazas, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personalplaza = new PersonalPlazas;
        $plazas = Plazas::get();
        $personal = Personal::get();

        return view('personalplazas.formulario3',['personalplaza' => $personalplaza, 'plazas' => $plazas, 'personal' => $personal ]);
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personalplazasValidado = request()->validate([
            'tipoNombramiento'=> 'required',
            'plazas_id'=> 'required',
            'personals_id'=> 'required',
            
        ]);
       
        
        PersonalPlazas::create($personalplazasValidado);
        return redirect()->route('personalplazas.index')->with('mensaje', 'El Personal de Plaza se INSERTO correctamente ');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalPlazas $personalplaza)
    {
        return view('personalplazas.show', ['personalplaza' => $personalplaza]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalPlazas $personalplaza)
    {

        $plazas = Plazas::get();
        $personal = Personal::get();
        return view('personalplazas.formulario3', ['personalplaza' => $personalplaza, 'plazas' => $plazas, 'personal' => $personal]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalPlazas $personalplaza)
    {
        
        $personalplazasValidado = request()->validate([
            'tipoNombramiento'=> 'required',
            'plazas_id'=> 'required',
            'personals_id'=> 'required',
            
        ]);

        $personalplaza->update($personalplazasValidado);
        return redirect()->route('personalplazas.index')->with('mensaje', 'El personal plaza se ACTUALIZO correctamente ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalPlazas $personalplaza)
    {
        $personalplaza->delete();
        return redirect()->route('personalplazas.index');
    }
}
