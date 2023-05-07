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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Planes</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">PLAN - ORGANIZADOR</h5>
                                </center>
                            </div>
                            <img class="card-img-top" src="{{ asset('assets/img/portfolio/organizador2.png') }}"
                                alt="..." width="10px" height="250px">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Funcionalidades:</h5>
                                </center>
                                <i class="fas fa-bolt">
                                </i> Crear eventos. <br>
                                <i class="fas fa-bolt">
                                </i> Editar eventos. <br>
                                <i class="fas fa-bolt">
                                </i> Eliminar eventos. <br>
                                <i class="fas fa-bolt">
                                </i> Asignación de fotógrafos a los eventos. <br>
                            </div>
                            <center>
                                <p> <b> Suscripción por 30 días </b> </p>
                            </center>
                            <div class="card-footer">
                                <center>
                                    <?php $monto = '15' ?>
                                    <button type="button" class="btn btn-success"> <i class="fa-brands fa-paypal"></i>
                                        <a href="{{route('pay.payPal', $monto)}}" style="color:white"> $ 15.00 </a>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">PLAN - FOTÓGRAFO</h5>
                                </center>
                            </div>
                            <img class="card-img-top" src="{{ asset('assets/img/portfolio/fotografo2.png') }}"
                                alt="..." width="10px" height="250px">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Funcionalidades:</h5>
                                </center>
                                <i class="fas fa-bolt">
                                </i> Subir fotos a un determinado evento. <br>
                                <i class="fas fa-bolt">
                                </i> Editar fotos a un determinado evento. <br>
                                <i class="fas fa-bolt">
                                </i> Eliminar fotos a un determinado evento. <br>
                                <i class="fas fa-bolt">
                                </i> Publicar fotos de los eventos <br>
                            </div>
                            <center>
                                <p> <b> Suscripción por 30 días </b> </p>
                            </center>
                            <div class="card-footer">
                                <center>
                                    <?php $monto = '10' ?>
                                    <button type="button" class="btn btn-success"> <i class="fa-brands fa-paypal"></i>
                                        <a href="{{route('pay.payPal', $monto)}}" style="color:white"> $ 10.00 </a>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">PLAN - INVITADO</h5>
                                </center>
                            </div>
                            <img class="card-img-top" src="{{ asset('assets/img/portfolio/invitado2.png') }}" alt="..."
                                width="10px" height="250px">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Funcionalidades:</h5>
                                </center>
                                <i class="fas fa-bolt">
                                </i> Ver fotos de los eventos <br>
                                <i class="fas fa-bolt">
                                </i> Descargar fotos de los eventos <br>
                                <i class="fas fa-bolt">
                                </i> Búsqueda de fotos por inteligencia artificial <br>
                            </div>
                            <center>
                                <p> <b> Suscripción por 30 días </b> </p>
                            </center>
                            <div class="card-footer">
                                <center>
                                    <?php $monto = '5' ?>
                                    <button type="button" class="btn btn-success"> <i class="fa-brands fa-paypal"></i>
                                        <a href="{{route('pay.payPal', $monto)}}" style="color:white"> $ 5.00 </a>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
