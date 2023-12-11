<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    
    public function index()
    {
        // $alumnos = Alumno::get();
        // $alumnos = Alumno::simplePaginate(5);
        // $alumnos = Alumno::paginate(5);
        
        // return view('alumnos.index',['alumnos'=>$alumnos]);

        $input = request()->txtapellido;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $alumnos = Alumno::where('apellidop', 'like', $p1 . '%')->paginate(5);
        return view('alumnos.index', ['alumnos' => $alumnos, 'input' => $input]);
    }


    public function index2(){
        // $alumnos = Alumno::get();
        $alumnos = Alumno::paginate(4);
        return response()->json($alumnos);
    }
    
    public function create()
    {
        $alumno = new alumno;
        $carreras = Carrera::get();


        
        return view('alumnos.formulario3',['alumno' => $alumno, 'carreras' => $carreras]);
    }

   
    public function store(Request $request)
    { 

        $alumnoValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required', 
            'apellidom'=>'required',
            'foto' => 'required|mimes: jpg,png,svg,jpeg']);

        $alumno = new Alumno($alumnoValidado);
        $nombreFoto = $request->file('foto')->store('public/');
        $alumno->foto = Storage::url($nombreFoto);

        $alumno->save();
        return redirect()->route('alumnos.index')->with('mensaje', 'El alumno se INSERTO correctamente' . request()->nombre);
        
    }

   
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', ['alumno'=>$alumno]);
    }

    
    public function edit(Alumno $alumno)
    {
        return view('alumnos.formulario3',['alumno'=>$alumno]);

    }

    
    public function update(Request $request, Alumno $alumno)
    {
        $alumnoValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required', 
            'apellidom'=>'required',
            'foto' => 'mimes: jpg,png,svg,jpeg'
        ]);
        

        if($request->hasFile('foto')){
            if($alumno->foto) {
                Storage::delete($alumno->foto);
            }
            Storage::delete($alumno->foto);
            $nombreFoto = $request->file('foto')->store('public');
            $alumno->fill($alumnoValidado);
            $alumno->foto = Storage::url($nombreFoto);
            $alumno->save();
        }else{
            $alumno->update($alumnoValidado);
        }
        return redirect()->route('alumnos.index');
    }   

    
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}
