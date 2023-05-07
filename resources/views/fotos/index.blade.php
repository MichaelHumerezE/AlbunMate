@extends('layouts.app-master')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <h1>Eventos - Fotos</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select class="form-select" id="limit" name="limit">
                            @foreach ([10, 20, 50, 100] as $limit)
                                <option value="{{ $limit }}"
                                    @if (isset($_GET['limit'])) {{ $_GET['limit'] == $limit ? 'selected' : '' }} @endif>
                                    {{ $limit }}</option>
                            @endforeach
                        </select>
                        <?php
                        if (isset($_GET['page'])) {
                            $pag = $_GET['page'];
                        } else {
                            $pag = 1;
                        }
                        if (isset($_GET['limit'])) {
                            $limit = $_GET['limit'];
                        } else {
                            $limit = 10;
                        }
                        $comienzo = $limit;
                        ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search"
                            aria-label="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                    </div>
                </div>
                @if ($eventos->total() > 10)
                    {{ $eventos->links() }}
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Dirección</th>
                            <th>Fecha</th>
                            <th>Tipo De Evento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $valor = 1;
                        if ($pag != 1) {
                            $valor = $comienzo + 1;
                        }
                        //$valor = 1;
                        ?>
                        @if ($eventosF->all() != '' && auth()->user()->tipo_f == 1)
                            @foreach ($eventosF as $eventoF)
                                @foreach ($eventos as $evento)
                                    @if ($eventoF->id_evento == $evento->id)
                                        <tr>
                                            <th scope="row">{{ $valor++ }}</th>
                                            <td>{{ $evento->name }}</td>
                                            <td>
                                                <img src="{{ asset(Storage::disk('s3')->url($evento->image)) }}" width="100">
                                            </td>
                                            <td>{{ $evento->direccion }}</td>
                                            <td>{{ $evento->fecha }}</td>
                                            @foreach ($tiposEventos as $tipoEvento)
                                                @if ($tipoEvento->id == $evento->id_tipoEvento)
                                                    <td>{{ $tipoEvento->name }}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('fotos.fotos', $evento->id) }}"
                                                        class="btn btn-info"><i class="fas fa-plus"></i><i
                                                            class="fas fa-image"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            @foreach ($eventos as $evento)
                                <tr>
                                    <th scope="row">{{ $valor++ }}</th>
                                    <td>{{ $evento->name }}</td>
                                    <td>
                                        <img src="{{ Storage::disk('s3')->url($evento->image) }}" width="100">
                                    </td>
                                    <td>{{ $evento->direccion }}</td>
                                    <td>{{ $evento->fecha }}</td>
                                    @foreach ($tiposEventos as $tipoEvento)
                                        @if ($tipoEvento->id == $evento->id_tipoEvento)
                                            <td>{{ $tipoEvento->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('fotos.fotos', $evento->id) }}" class="btn btn-info"><i
                                                    class="fas fa-plus"></i><i class="fas fa-image"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            @if ($eventos->total() > 10)
                {{ $eventos->links() }}
            @endif
        </div>
    </div>
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
        $('#limit').on('change', function() {
            window.location.href = "{{ route('fotos.index') }}?limit=" + $(this).val() + '&search=' + $(
                '#search').val()
        })

        $('#search').on('keyup', function(e) {
            if (e.keyCode == 13) {
                window.location.href = "{{ route('fotos.index') }}?limit=" + $('#limit').val() +
                    '&search=' +
                    $(this).val()
            }
        })
    </Script>
@endsection
