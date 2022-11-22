@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fl"><i class="fa-regular fa-file-lines"></i></i> Editar documento </h3>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="needs-validation" novalidate method="POST"
                            action="{{ route('documento.update', $dep) }}">
                            {{-- csrf etiqueta de blade que agrega un token oculto en el formulario para evitar falsificacion 
                                de peticion  --}}
                            @csrf @method('PATCH')
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Nombre </label>
                                <input placeholder="Ingrese el nombre" type="text" class="form-control" id="nombre"
                                    name="nombre" aria-describedby="nombreHelp" value="{{ old('nombre', $dep->nombre) }}"
                                    required>
                                @error('nombre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tipo_id" class="form-label"> Tipo de documento </label>
                                <select class="form-select" aria-label="Default select example" name="tipo_id">
                                    <option value="" >Seleccione</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{ (old('tipo_id', $dep->tipo_documento_id) == $tipo->id) ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cliente_id" class="form-label"> Clientes </label>
                                <select class="form-select" aria-label="Default select example" name="cliente_id">
                                    <option value="" >Seleccione</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ (old('cliente_id', $dep->clientes_id ) == $cliente->id ) ? 'selected' : '' }} >{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('cliente_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="departamento_id" class="form-label"> Departamento </label>
                                <select class="form-select" aria-label="Default select example" name="departamento_id">
                                    <option value="" >Seleccione</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{ (old('departamento_id',$dep->departamento_id) == $departamento->id) ? 'selected' : ''}} >{{ $departamento->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('departamento_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="formato" class="form-label"> Formato </label>
                                <input placeholder="Ingrese el formato" type="text" class="form-control" id="formato"
                                    name="formato" aria-describedby="formatoHelp"
                                    value="{{ old('formato', $dep->formato) }}" required>
                                @error('formato')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="size" class="form-label"> Tamaño </label>
                                <input placeholder="Ingrese el size" type="text" class="form-control" id="size"
                                    name="size" aria-describedby="sizeHelp"
                                    value="{{ old('size', $dep->size) }}" required>
                                @error('size')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="remitente" class="form-label"> Remitente </label>
                                <input placeholder="ingrese el remitente" type="text" class="form-control" id="remitente"
                                    name="remitente" aria-describedby="remitenteHelp"
                                    value="{{ old('remitente', $dep->remitente) }}" required>
                                @error('remitente')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning"> Actualizar </button>
                            <a type="button" href="{{ route('documento.index') }}" class="btn btn-secondary"> Cancelar
                            </a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection