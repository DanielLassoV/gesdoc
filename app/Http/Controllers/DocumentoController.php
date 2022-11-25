<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Documento;
use App\Models\TipoDocumentos;
use App\Models\Clientes;
use App\Models\Departamento;


class DocumentoController extends Controller
{
    public function index()
    {
        $documento = Documento::with("departamento","clientes","user","tipodocumento")->get();
        // return $documento;
        return view('templates/documento/index', compact('documento'));
    }

    public function create(){
        $tipos = TipoDocumentos::all();
        $clientes = Clientes::all();
        $departamentos =Departamento::all();
        return view('templates/documento/create', compact('tipos','clientes','departamentos'));

    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => ["required"],
                // "formato" => ["required"],
                // "size" => ["required"],
            "remitente" => ["required"],
            "tipo_id" => ["required"],
            "departamento_id" => ["required"],
            "cliente_id" => ["required"],
            'file' => 'required|mimes:pdf,xlx,csv,jpeg,jpg,png,doc,docx,xlsx',
            
        ]);


        $originalName = ''; //Nombre original del archivo
        $fileExtension = ''; //Extension del archivo jpg.pdf etc
        $filesize = ''; //Tamaño del archivo
        $fileName = ''; //Nombre generado para evitar duplicidad y remplazo (Nombre incriptado)
        $path = ''; //Ubicacion 

        if($request->hasFile("file")) //Verifica si hay un archivo llamado file, si existe 
        {
            $originalName = $request->file->getClientOriginalName(); // Extrae el nombre original del archivo
            $fileExtension = $request->file->extension();
            $filesize = $request->file->getSize();
            $filename = time().'.'. $request->file->extension(); //Ej. 21376387136.jpg
            $path = $request->file->storeAs("Documentos",$filename); // Guardar en la carpeta documentos el archivo
        }
        

        $dep = new Documento();
        $dep->usuarios_id = Auth::id(); // 1
        $dep->tipo_documento_id = $request->tipo_id; // 1
        $dep->clientes_id = $request->cliente_id;
        $dep->departamento_id = $request->departamento_id;
        $dep->nombre = $request->nombre;

                //Setiando las nuevas variables con los nuevos que estan arriba 

        $dep->archivo_formato = $fileExtension ;
        $dep->archivo_size = $filesize;
        $dep->archivo_nombre = $filename;
        $dep->archivo_nombre_anterior = $originalName;
        $dep->archivo_url = $path;

        $dep->remitente = $request->remitente;
        $dep->save();

        session()->flash("status", "Cliente creado exitosamente");
        // to_route es un helper de laravel para abreviar 
        return to_route("documento.index");
    }

    public function edit(Documento $dep)
    {
        
        $tipos = TipoDocumentos::all();
        $clientes = Clientes::all();
        $departamentos = Departamento::all();
        return view("templates.documento.edit", compact("dep","tipos","clientes","departamentos"));
    }

    public function update(Request $request, $dep)
    {
        $request->validate([
            "nombre" => ["required"],
            // "formato" => ["required"],
            // "size" => ["required"],
            "remitente" => ["required"],
            "tipo_id" => ["required"],
            "departamento_id" => ["required"],
            "cliente_id" => ["required"],


        ]);

        $originalName = ''; //Nombre original del archivo
        $fileExtension = ''; //Extension del archivo jpg.pdf etc
        $filesize = ''; //Tamaño del archivo
        $fileName = ''; //Nombre generado para evitar duplicidad y remplazo (Nombre incriptado)
        $path = ''; //Ubicacion 

        if($request->hasFile("file")) //Verifica si hay un archivo llamado file, si existe 
        {
            $originalName = $request->file->getClientOriginalName(); // Extrae el nombre original del archivo
            $fileExtension = $request->file->extension();
            $filesize = $request->file->getSize();
            $filename = time().'.'. $request->file->extension(); //Ej. 21376387136.jpg
            $path = $request->file->storeAs("Documentos",$filename); // Guardar en la carpeta documentos el archivo
        }
        
                //Setiando las nuevas variables con los nuevos que estan arriba 





        $dep = Documento::find($dep);
        $dep->nombre = $request->nombre;
        // $dep->formato = $request->formato;
        // $dep->size = $request->size;
        $dep->remitente = $request->remitente;
        $dep->tipo_documento_id = $request->tipo_id; // 1
        $dep->clientes_id = $request->cliente_id;
        $dep->departamento_id = $request->departamento_id;
        $dep->archivo_formato = $fileExtension ;
        $dep->archivo_size = $filesize;
        $dep->archivo_nombre = $filename;
        $dep->archivo_nombre_anterior = $originalName;
        $dep->archivo_url = $path;
        $dep->save();

        session()->flash("status", "Documento editado exitosamente");

        return to_route("documento.index");
    }

    public function download($file)
    {
        return response()->download(storage_path('/app/documentos/'. $file));
    }
}

