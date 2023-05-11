@extends('layouts.auth-client')
@section('content')
    <br>
    <main class="container">
        <br><br>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                @include('layouts.partials.messages')
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $evento->name }} - Fotos
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="container mb-4">
                    <form action="{{ route('recognition.compareFaces') }}" method="POST" enctype="multipart/form-data"
                        id="update">
                        @csrf
                        <input type="hidden" value="75" name="threshold">
                        <input type="hidden" value="{{ $evento->carpeta }}" name="collectionId">
                    </form>
                    <Button class="btn btn-primary" form="update">
                        <i class="fas fa-magnifying-glass"></i> Busqueda por Imágenes
                    </Button>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    @foreach ($fotos as $foto)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal{{ $foto->id }}">
                                <a href="{{ route('catalogoEventos.show', $foto->id) }}">
                                    <div
                                        class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                        <div class="portfolio-item-caption-content text-center text-white">
                                            Descargar
                                            <i class="fas fa-download fa-3x"></i>
                                        </div>
                                    </div>
                                </a>
                                <img class="img-fluid" src="{{ asset(Storage::disk('s3')->url($foto->image)) }}"
                                    alt="..." width="400" />
                                <!--
                                <img class="img-fluid" src="{{ route('watermark.imagen', basename(Storage::disk('s3')->url($foto->image))) }}"
                                    alt="..." width="400" />-->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
