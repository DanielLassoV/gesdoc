@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fl"><i class="fa-solid fa-user-tie"></i></i> Listados de documentos</h3>
                        <a href="{{route ('documento.create')}}" type="button" class="btn btn-primary fr">
                            <i class="fa-solid fa-plus"></i> Nuevo
                        </a>
                    </div>

                    <div class="card-body table-responsive">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Tipo de documento</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Nombre</th>
                                    {{-- <th scope="col">Formato</th>
                                    <th scope="col">Tamaño</th> --}}
                                    <th scope="col">Remitente</th>
                                    <th scope="col">Archivo</th>
                                    <th scope="col" class="mw-200">
                                        <div class="fr">Acciones</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documento as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ ($item->tipodocumento) ? $item->tipodocumento->nombre : '' }}</td>
                                        <td>{{ ($item->clientes) ? $item->clientes->nombre : '' }}</td>
                                        {{-- Si no tiene trae nada poner vacio --}}
                                        <td>{{ ($item->departamento) ? $item->departamento->nombre : '' }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        {{-- <td>{{ $item->formato }}</td>
                                        <td>{{ $item->size }}</td> --}}
                                        <td>{{ $item->remitente }}</td>
                                        <td><a href="{{ route('documento.download', $item->archivo_nombre)}}">{{ $item->archivo_nombre}}</a></td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="{{ route('documento.edit', $item) }}" type="button"
                                                    class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i>
                                                    Editar</a>
                                                    <a href="{{ route('documento.delete', $item->id) }}" type="button"
                                                        class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i>
                                                        Eliminar</a>
                                            </div>
                                        </td>
                                        {{-- <td>{{ $item['nombre'] }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
