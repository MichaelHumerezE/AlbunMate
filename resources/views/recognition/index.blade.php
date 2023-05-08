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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Imagenes Econtradas
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5">
                    <a href="{{ route('catalogoEventos.index') }}" class="btn btn-primary ml-auto">
                        <i class="fas fa-arrow-left"></i>
                        Volver a Eventos</a>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    @foreach ($fotosEnc as $fotoEnc)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal{{ $fotoEnc->id }}">
                                <a href="{{ route('catalogoEventos.show', $fotoEnc->id) }}">
                                    <div
                                        class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                        <div class="portfolio-item-caption-content text-center text-white">
                                            Descargar
                                            <i class="fas fa-download fa-3x"></i>
                                        </div>
                                    </div>
                                </a>
                                <img class="img-fluid" src="{{ asset(Storage::disk('s3')->url($fotoEnc->image)) }}"
                                    alt="..." width="400" />
                            </div>
                        </div>
                    @endforeach
                    @if (isset($fotosEnc))
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ninguna Imagen
                            Econtrada
                        </h2>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
