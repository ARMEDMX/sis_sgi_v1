<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use App\Models\Periodos;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtRFC;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $horarios = Horarios::where('fecha', 'like', $p1 . '%')->paginate(5);

        return view('horarios.index', ['horarios' => $horarios]);   
    }

    public function obtenerDatos(){

        $horarios = Horarios::with('personal', 'periodos')->get();
        return response()->json($horarios);
        
    }
    
    public function crearHorario(Request $request) {
        // Valida y crea el horario

          
        dd($request->all()); 

        $validatedData = $request->validate([
            'fecha' => 'required',
            'personals_id' => 'required',
            'periodos_id' => 'required',
            // Agrega otras validaciones si es necesario
        ]);
      
        $horario = Horarios::create($validatedData);

        // Puedes retornar una respuesta JSON con el nuevo horario creado
        return response()->json(['message' => 'Horario creado con éxito', 'horario' => $horario], 201);
    
    }
    

    public function obtenerPP() {
        $periodos = Periodos::all();
        $personals = Personal::all();
    
        return response()->json([
            'periodos' => $periodos,
            'personals' => $personals
        ]);
    }
    
    public function obtenerPersonal() {
        $personals = Personal::all();
        return response()->json($personals);
    }
    
    

    public function guardarHorarios(Request $request)
{
    try {
        $data = $request->all();

        $horario = new Horarios();
        $horario->personal_id = $data['personal']; // Asegúrate de que la clave sea correcta
        $horario->periodos_id = $data['periodos']; // Asegúrate de que la clave sea correcta
        $horario->fecha = $data['fecha'];

        // Guardar el horario
        $horario->save();

        // Obtener los datos de personal y periodos a partir de las relaciones
        $personal = $horario->personal; // Accede a la relación en el modelo Horarios
        $periodos = $horario->periodos; // Accede a la relación en el modelo Horarios

        return response()->json(['message' => 'Horario agregado correctamente', 'personal' => $personal, 'periodos' => $periodos]);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error al agregar el horario: ' . $e->getMessage()], 500);
    }
}



    


    



    public function create()
    {
        $horario = new Horarios;
        $personal = Personal::get();
        $periodos = Periodos::get();
        
        return view('horarios.formulario3',['horario' => $horario, 'personal' => $personal, 'periodos' => $periodos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $horariosValidados = request()->validate([
            'fecha'=>'required', 
            'periodos_id'=>'required',
            'personals_id'=> 'required']);

        
        Horarios::create($horariosValidados);
        return redirect()->route('horarios.index')->with('mensaje', 'El horario se INSERTO correctamente ');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Horarios $horario)
    {
        return view('horarios.show', ['horario' => $horario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horarios $horario)
    {
        $personal = Personal::get();
        $periodos = Periodos::get();
        
        return view('horarios.formulario3',['horario' => $horario, 'personal' => $personal, 'periodos' => $periodos]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horarios $horario)
    {
        $horariosValidados = request()->validate([
            'fecha'=>'required', 
            'periodos_id'=>'required',
            'personals_id'=> 'required']);

            $horario->update($horariosValidados);
            return redirect()->route('horarios.index')->with('mensaje', 'El horario se ACTUALIZO correctamente ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horarios $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index');
    }
}
