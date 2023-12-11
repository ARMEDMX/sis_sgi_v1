<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Deptos;

use App\Models\Carrera;

class DeptosController extends Controller
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
        
        $departamentos = Deptos::with('carreras')->where('nombrecorto', 'like', $p1 . '%')->paginate(5);
        return view('deptos.index', ['departamentos' => $departamentos, 'input' => $input]);
    }

    public function index2(){
        // $alumnos = Alumno::get();
        $deptos = Deptos::with('carreras.reticulas.materias')->paginate(4);
        return response()->json($deptos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deptos = new deptos;
        $carreras = Carrera::get();

        // $carreras = Carrera::select('id', 'nombre')->get()->toArray();

        return view('deptos.formulario3',['deptos' => $deptos, 'carreras' => $carreras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Deptos::create($request->all());
    
        // return redirect()->route('deptos.index');

        $deptoValidado = request()->validate([
            'nombre'=>'required', 
            'nombrecorto'=>'required', 
            'descripcion'=>'required']);
        
       

        Deptos::create($deptoValidado);
        return redirect()->route('deptos.index')->with('mensaje', 'El departamento se INSERTO correctamente ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deptos $deptos)
    {
        return view('deptos.show', ['deptos'=>$deptos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deptos $deptos, Carrera $carreras)
    {
        // return view('deptos.edit', compact('deptos'));
        
        
        return view('deptos.formulario3',['deptos'=>$deptos, 'carreras' => $carreras]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deptos $deptos)
    {

    // // Llena el modelo Deptos con los datos de la solicitud.
    // $deptos->fill($request->all());

    // // Guarda los cambios en la base de datos.
    // $deptos->save();

    // // Redirige al usuario a la lista de departamentos con un mensaje de éxito.
    // return redirect()->route('deptos.index')->with('success', 'El departamento se ha actualizado con éxito.');

    $deptoValidado = request()->validate([
        'nombre'=>'required', 
        'nombrecorto'=>'required', 
        'descripcion'=>'required']);
        

    $deptos->update($deptoValidado);
    return redirect()->route('deptos.index')->with('mensaje', 'El departamento se ACTUALIZO correctamente ');

    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deptos $deptos)
    {
        $deptos->delete();
        return redirect()->route('deptos.index');
    }
}
