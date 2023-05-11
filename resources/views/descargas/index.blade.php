@extends('layouts.auth-client')
@section('content')
    <br>
    <main class="container">
        <br><br>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                @include('components.flash_alerts')
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Descargas</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="card mt-3">
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
                            @if ($descargas->total() > 10)
                                {{ $descargas->links() }}
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Fotografo</th>
                                        <th>Invitado</th>
                                        <th>Evento</th>
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
                                    @foreach ($descargas as $descarga)
                                        <tr>
                                            <th scope="row">{{ $valor++ }}</th>
                                            <td>{{ $descarga->fecha }}</td>
                                            <td>{{ $descarga->hora }}</td>
                                            @foreach ($users as $user)
                                                @if ($user->id == $descarga->id_fotografo)
                                                    <td>{{ $user->name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ auth()->user()->name }}</td>
                                            <td>{{ $descarga->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if ($descargas->total() > 10)
                            {{ $descargas->links() }}
                        @endif
                    </div>
                </div>
                <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
                <Script type="text/javascript">
                    $('#limit').on('change', function() {
                        window.location.href = "{{ route('descargas.show', auth()->user()->id) }}?limit=" + $(this).val() + '&search=' + $(
                            '#search').val()
                    })

                    $('#search').on('keyup', function(e) {
                        if (e.keyCode == 13) {
                            window.location.href = "{{ route('descargas.show', auth()->user()->id) }}?limit=" + $('#limit').val() +
                                '&search=' +
                                $(this).val()
                        }
                    })
                </Script>
            </div>
        </section>
    </main>
@endsection
