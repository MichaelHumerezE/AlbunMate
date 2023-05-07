@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Ver Foto</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('fotos.fotos', $id_evento) }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data" id="create">
                @include('fotos.partials.form')
            </form>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection
