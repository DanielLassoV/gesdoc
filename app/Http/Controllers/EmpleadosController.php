<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('templates/empleados/index', compact('empleados'));
    }

    public function create()
    {
        return view('templates/empleados/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => ["required"],
            "doc_id" => ["required"],
            "telefono" => ["required"],
            "direccion" => ["required"],    
        ]);

        $dep = new Empleado();
        $dep->usuarios_id = Auth::id();
        $dep->nombre = $request->nombre;
        $dep->documento_de_identidad = $request->doc_id;
        $dep->telefono = $request->telefono;
        $dep->direccion = $request->direccion;
        $dep->save();

        session()->flash("status", "Empleado creado exitosamente");
        // to_route es un helper de laravel para abreviar 

        return view('templates/empleados/create');


    }

    public function edit(Empleado $dep)
    {
        return view("templates.empleados.edit", compact("dep"));
    }

    public function update(Request $request, $dep)
    {
        $request->validate([
            "nombre" => ["required"]
        ]);

        $dep = Empleado::find($dep);
        $dep->usuarios_id = Auth::id();
        $dep->nombre = $request->nombre;
        $dep->documento_de_identidad = $request->doc_id;
        $dep->telefono = $request->telefono;
        $dep->direccion = $request->direccion;
        $dep->save();

        session()->flash("status", "Empleado editado exitosamente");

        return to_route("empleados.index");
    }

    public function delete($id)
    {
        Empleado::destroy($id);

        session()->flash('status', 'Empleado eliminado exitosamente');
        
        return to_route('empleados.index');
    }


}
