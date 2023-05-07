@extends('layouts.app-master')
@section('content')
    <center>
        <h1>Home</h1>
        @auth
            <p>Bienvenido {{ auth()->user()->name ?? auth()->user()->email }}, estás autenticado a la página.</p>
        @endauth
    </center>
@endsection
