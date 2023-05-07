@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Editar Fotografo De Los Eventos</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('eventos.index') }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{route('fotografosEventos.update', $fotografoEvento->id)}}" method="POST" id="update">
                @method('PUT')
                @include('fotografosEventos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="update">
                <i class="fas fa-pencil-alt"></i> Editar
            </Button>
        </div>
    </div>
@endsection
