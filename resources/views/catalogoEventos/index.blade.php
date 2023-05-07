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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Eventos</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    @foreach ($eventos as $evento)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <center>
                                <h5>{{ $evento->name }}</h5>
                            </center>
                            <div class="portfolio-item mx-auto" data-bs-toggle="modal"
                                data-bs-target="#portfolioModal{{ $evento->id }}">
                                <div
                                    class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="portfolio-item-caption-content text-center text-white"><i
                                            class="fas fa-circle-arrow-right fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset(Storage::disk('s3')->url($evento->image)) }}"
                                    alt="..." width="400"/>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Portfolio Modals-->
        @foreach ($eventos as $evento)
            <!-- Portfolio Modal 1-->
            <div class="portfolio-modal modal fade" id="portfolioModal{{ $evento->id }}" tabindex="-1"
                aria-labelledby="portfolioModal{{ $evento->id }}" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                                aria-label="Close"></button></div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Ingresar Código
                                        </h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <form action="{{ route('catalogoEventos.store') }}" method="POST">
                                            @csrf
                                            <!-- Portfolio Modal - Text-->
                                            <div class="form-floating mb-3">
                                                <input type="password" name="codigo" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    placeholder="codigo">
                                                <label for="exampleInputEmail1">Código</label>
                                            </div>
                                            <input type="hidden" name="id_evento" id="id_evento"
                                                value="{{ $evento->id }}">
                                            <button class="btn btn-primary" data-bs-dismiss="modal" type="submit">
                                                Ingresar
                                                <i class="fas fa-arrow-right fa-fw"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endsection
