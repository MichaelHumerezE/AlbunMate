@extends('layouts.auth-client')
@section('content')
    <br>
    <main class="container">
        <br><br>
        <!-- Tipo Usuario Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                @include('layouts.partials.messages')
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tipo de usuario</h2>
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
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <center>
                                <img class="img-fluid" src="{{ asset('assets/img/portfolio/organizador.png') }}"
                                    alt="..." width="100px" height="100px" />
                                <h5>ORGANIZADOR</h5>
                            </center>
                        </div>
                    </div>
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <center>
                                <img class="img-fluid" src="{{ asset('assets/img/portfolio/fotografo.png') }}"
                                    alt="" width="120px" height="120px" />
                                <h5>FOTÓGRAFO</h5>
                            </center>
                        </div>
                    </div>
                    <!-- Portfolio Item 3-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <center>
                                <img class="img-fluid" src="{{ asset('assets/img/portfolio/invitado.png') }}" alt=""
                                    width="290px" height="290px" />
                                <h5>INVITADO</h5>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Modals-->
        <!-- Portfolio Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <form action="/register" method="POST">
                                        @csrf
                                        <h1>Crer Cuenta</h1>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
                                            <label for="exampleInputEmail1">Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                                else.</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" placeholder="password">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="exampleInputPassword1" placeholder="password_confirmation">
                                            <label for="exampleInputPassword1" class="form-label">Password
                                                confirmation</label>
                                        </div>
                                        <input type="hidden" name="tipo_f" value="0">
                                        <input type="hidden" name="tipo_i" value="1">
                                        <input type="hidden" name="tipo_o" value="0">
                                        <input type="hidden" name="tipo_p" value="0">
                                        <input type="hidden" name="suscripcion" value="0">
                                        <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-labelledby="portfolioModal2"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <form action="/register" method="POST">
                                        @csrf
                                        <h1>Crear Cuenta</h1>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
                                            <label for="exampleInputEmail1">Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                                else.</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" placeholder="password">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="exampleInputPassword1" placeholder="password_confirmation">
                                            <label for="exampleInputPassword1" class="form-label">Password
                                                confirmation</label>
                                        </div>
                                        <input type="hidden" name="tipo_f" value="0">
                                        <input type="hidden" name="tipo_i" value="1">
                                        <input type="hidden" name="tipo_o" value="0">
                                        <input type="hidden" name="tipo_p" value="0">
                                        <input type="hidden" name="suscripcion" value="0">
                                        <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"
                            aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <form action="/register" method="POST">
                                        @csrf
                                        <h1>Crear Cuenta</h1>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="name" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
                                            <label for="exampleInputEmail1">Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                                else.</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" placeholder="password">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="exampleInputPassword1" placeholder="password_confirmation">
                                            <label for="exampleInputPassword1" class="form-label">Password
                                                confirmation</label>
                                        </div>
                                        <input type="hidden" name="tipo_f" value="0">
                                        <input type="hidden" name="tipo_i" value="1">
                                        <input type="hidden" name="tipo_o" value="0">
                                        <input type="hidden" name="tipo_p" value="0">
                                        <input type="hidden" name="suscripcion" value="0">
                                        <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
