@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fl"><i class="fa-regular fa-square-plus"></i></i> Registrar empleado </h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="needs-validation" novalidate method="POST" action="{{ route('empleados.store') }}">
                            {{-- csrf etiqueta de blade que agrega un token oculto en el formulario para evitar falsificacion 
                                de peticion  --}}
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input placeholder="Ingrese el nombre" type="text" class="form-control" id="nombre"
                                    name="nombre" aria-describedby="nombreHelp" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="doc_id" class="form-label"> N° identidad </label>
                                <input placeholder="Ingrese el documento" type="text" class="form-control" id="doc_id"
                                    name="doc_id" aria-describedby="nombreHelp" value="{{ old('doc_id') }}" required>
                                @error('doc_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="telefono" class="form-label"> Telefono </label>
                                <input placeholder="Ingrese el numero" type="text" class="form-control" id="telefono"
                                    name="telefono" aria-describedby="nombreHelp" value="{{ old('telefono') }}" required>
                                @error('telefono')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          
                            <div class="mb-3">
                                <label for="direccion" class="form-label"> Direccion </label>
                                <input placeholder="Ingrese el numero" type="text" class="form-control" id="direccion"
                                    name="direccion" aria-describedby="nombreHelp" value="{{ old('direccion') }}" required>
                                @error('direccion')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary"> Registrar </button>
                            <a type="button" href="{{ route('empleados.index') }}" class="btn btn-secondary"> Cancelar
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
