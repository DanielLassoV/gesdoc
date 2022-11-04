<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;


class ClientesController extends Controller
{
    public function index(){   
        $clientes = Clientes::all();
        return view('templates/clientes/index', compact('clientes'));
    }

    public function create()
    {
        return view('templates/clientes/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => ["required"],
            "telefono" => ["required"],
            "correo" => ["required"],
            "direccion" => ["required"],
        ]);

        $dep = new Clientes();
        $dep->nombre = $request->nombre;
        $dep->telefono = $request->telefono;
        $dep->correo = $request->correo;
        $dep->direccion = $request->direccion;
        $dep->save();

        session()->flash("status", "Cliente creado exitosamente");
        // to_route es un helper de laravel para abreviar 
        return to_route("clientes.index");

        
    }

    public function edit(Clientes $dep)
    {
        return view("templates.clientes.edit", compact("dep"));
    }

    public function update(Request $request, $dep)
    {
        $request->validate([
            "nombre" => ["required"],
            "telefono" => ["required"],
            "correo" => ["required"],
            "direccion" => ["required"],
        ]);

        $dep = Clientes::find($dep);
        $dep->nombre = $request->nombre;
        $dep->telefono = $request->telefono;
        $dep->correo = $request->correo;
        $dep->direccion = $request->direccion;
        $dep->save();

        session()->flash("status", "Departamento editado exitosamente");

        return to_route("clientes.index");
    }

    public function delete($id)
    {
        Clientes::destroy($id);

        session()->flash('status', 'Cliente eliminado exitosamente');
        
        return to_route('clientes.index');
    }
}
