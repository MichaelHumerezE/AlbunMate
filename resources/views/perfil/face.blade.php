@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Imagen de Perfil</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('perfil.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('perfil.faceSave', $perfil->id) }}" method="POST" enctype="multipart/form-data" id="update">
                @csrf
                <div class="row">
                    @if (isset($perfil->face))
                        <img src="{{ asset(Storage::disk('s3')->url($perfil->face)) }}" alt="Cargando..." width="100">
                    @endif
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="file" placeholder="image" class="form-control" name="image"
                                value="{{ isset($foto) ? $foto->image : old('image') }}">
                            <label>Agregar o Cambiar Foto</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="update">
                <i class="fas fa-pencil-alt"></i> Guardar
            </Button>
        </div>
    </div>
@endsection
