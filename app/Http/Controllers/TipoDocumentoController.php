<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumentos;


class TipoDocumentoController extends Controller
{
    public function index()
    {
        $tipodocumento = TipoDocumentos::all();
        return view('templates.tipoDocumento.index', compact('tipodocumento'));
    } 
   
    public function create()
    {
        return view('templates/tipoDocumento/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => ["required"]
        ]);

        $dep = new TipoDocumentos();
        $dep->nombre = $request->nombre;
        $dep->save();

        session()->flash("status", "Tipo de documento creado exitosamente");
        // to_route es un helper de laravel para abreviar 
        return to_route("tipoDocumento.index");
    }

    public function edit(TipoDocumentos $dep)
    {
        return view("templates.tipoDocumento.edit", compact("dep"));
    }

    public function update(Request $request, $dep)
    {
        $request->validate([
            "nombre" => ["required"]
        ]);

        $dep = TipoDocumentos::find($dep);
        $dep->nombre = $request->nombre;
        $dep->save();

        session()->flash("status", "Tipo de documento editado exitosamente");

        return to_route("tipoDocumento.index");

        
    }

    public function delete($id)
    {
        TipoDocumentos::destroy($id);

        session()->flash('status', 'Tipo eliminado exitosamente');
        
        return to_route('tipoDocumento.index');
    }
}
