@extends('main')

@section('content')

    <header class="welcome full-height">

        <div class="container center">
            <div class="row justify-content-center text-center">

                <div class="col-md-8">
                    <div class="home-content">
                        <img src="images/logo/logo.svg" width="100" height="100" class="d-inline-block align-top" alt="">
                        <h1 class="white-text">ANBUSVR</h1>
                        <p class="white-text">ANALÍTICA PARA EMPRESAS A TRAVÉS DE LA REALIDAD VIRTUAL</p>

                        @guest
                            <a class="btn btn-light button" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                        @else
                            <a class="btn btn-light button" href="{{ route('project.index') }}">{{ __('Mis proyectos') }}</a>
                        @endguest
                    </div>
                </div>

            </div>
        </div>

    </header>

    <div class="container py-5">

        <div class="row py-2">
            <div class="col-12">

                <h2 class="mb-4">¿Qué es ANBUSVR?</h2>

                <div class="text-justify">
                    <p>ANBUSVR es una aplicación de análisis, tratamiento y representación de datos a través de la Realidad Virtual destinada a las empresas.</p>
                    <p>Estos sistemas virtuales son mas completos que cualquier otro sistema de computación, nos permite conseguir recrear la realidad e interactuar con ella, y a su vez, nos permite obtener y analizar una gran cantidad de datos reales con una mayor fiabilidad.</p>
                    <p></p>

                </div>



            </div>
        </div>
    </div>

    <div style="background-color: #ddd7ff5e;">
        <div class="container py-5" >

            <div class="row py-2">
                <div class="col-12">

                    <h2 class="mb-4">¿Por qué usar ANBUSVR?</h2>

                    <div class="row justify-content-center text-center">
                        <div class="col-md-4 py-3">
                            <div class="card">
                                <div class="card-body" style="min-height: 300px;">
                                    <img src="images/icons/1.png" alt="1" width="100" height="100">
                                    <h5 class="card-title">Fácil proceso de integración</h5>
                                    <div>
                                        En unos pocos minutos puede hacer que su proyecto de realidad virtual empiece a analizar cada uno de los objetos que desee.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 py-3">
                            <div class="card">
                                <div class="card-body" style="min-height: 300px;">
                                    <img src="images/icons/3.png" alt="3" width="100" height="100">
                                    <h5 class="card-title">Estudio sobre sus productos</h5>
                                    <div>
                                        Obtenga información sobre cómo los usuarios interactúan con su productos y cuales le llaman más la atención.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 py-3">
                            <div class="card">
                                <div class="card-body" style="min-height: 300px;">
                                    <img src="images/icons/2.png" alt="2" width="100" height="100">
                                    <h5 class="card-title">Representación Analítica</h5>
                                    <div>
                                        Gracias a las gráficas podrá ver en todo momento el análisis de su aplicación.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="background" style="background-color: #b5a9f95e;">

        <div class="container py-5">
            <div class="row justify-content-between">
                <div class="col-6 text-left align-self-center">
                    <h2 class="card-title">Aplicación web</h2>
                    <div>
                        Sitio personal para ver la analítica de todos los objetos de sus proyectos en cualquier lugar y en cualquier momento.
                    </div>
                </div>
                <div class="col-6 text-right align-self-center">
                    <img src="images/icons/4.png" alt="4" width="500" height="500">
                </div>
            </div>
        </div>

    </div>

@endsection
