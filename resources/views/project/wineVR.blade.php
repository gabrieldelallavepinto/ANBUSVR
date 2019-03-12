@extends('main')

@section('content')

<header class="full-height">
    <div class="bg-img" style="background-image: url('images/bodega1.jpg');" >
        <div class="overlay"></div>
    </div>


    <div class="home centrado">
        <div class="container">
            <div class="row justify-content-center">

                <!-- home content -->
                <div class="col-md-8">
                    <div class="home-content">
                        <h1 class="white-text">Vinos De Jerez</h1>
                        <p class="white-text">Gracias a un estudio estadístico podemos ver el tipo de vino que la gente prefiere.</p>
                        <a href="" class="btn btn-light button">Acceder</a>
                    </div>
                </div>
                <!-- end -->


            </div>


        </div>
    </div>
</header>

<div class="height-20"></div>

{{-- tipos de vino --}}
@php
    $tiposVinos = [
        'generosos' => [
            'name' => 'generosos',
            'wines' => [
                'manzanilla' => [
                    'name' => 'manzanilla',
                    'description' => 'Vino muy pálido, de un brillante color amarillo pajizo. De aroma punzante y delicado en el que destacan notas florales que recuerdan a la camomila, recuerdos almendrados y aromas de panadería. Al paladar es seco, fresco y delicado; con un paso de boca ligero y suave, a pesar de su final seco. Presenta una ligera acidez que produce una agradable sensación de frescor y un regusto persistente y ligeramente amargo.',
                ],
                'fino' => [
                    'name' => 'fino',
                    'description' => 'hola esto es una pequeña descripción',
                ],
                'amontillado' => [
                    'name' => 'amontillado',
                    'description' => 'hola esto es una pequeña descripción',
                ],
                'paloCortado' => [
                    'name' => 'palo Cortado',
                    'description' => 'hola esto es una pequeña descripción',
                ],
                'oloroso' => [
                    'name' => 'oloroso',
                    'description' => 'hola esto es una pequeña descripción',
                ],
            ],

        ],
        'generososLicor' => [
            'name' => 'generosos de licor',
            'wines' => [
                'paleCream' => [
                    'name' => 'pale cream',
                    'description' => 'hola esto es una pequeña descripción',
                ],
                'medium' => [
                    'name' => 'medium',
                    'description' => 'hola esto es una pequeña descripción',
                ],
                'cream' => [
                    'name' => 'cream',
                    'description' => 'hola esto es una pequeña descripción',
                ],

            ],

        ],
        'dulcesNaturales' => [
            'name' => 'dulces naturales',
            'wines' => [
                'pedroXimenez' => [
                    'name' => 'Pedro Ximénez',
                    'description' => 'hola esto es una pequeña descripción',
                ],
                'moscatel' => [
                    'name' => 'Moscatel',
                    'description' => 'hola esto es una pequeña descripción',
                ],
            ],

        ],
    ];
@endphp
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-uppercase"> TIPOS DE VINOS </h3>
        </div>
    </div>
    <div class="row">
        @foreach ($tiposVinos as $key => $tipo)

            <div class="col-md-12">
                <h4 class="text-uppercase"> {{$tipo['name']}} </h4>
            </div>

            @foreach ($tipo['wines'] as $key => $wine)
            <div class="col-md-3">

                <div class="card text-center analytics">
                    <img class="img" src="images/tiposVino/{{$key}}.png" alt="Card image cap" draggable="false">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase name">{{ $wine['name'] }}</h5>
                        <p class="card-text description d-none">{{ $wine['description'] }}</p>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>
            </div>

            @endforeach
        @endforeach
    </div>
</div>
{{-- end --}}
<div class="height-20"></div>



<div id="wineModal" class="modal fade " tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title name text-uppercase">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <p class="description text-justify">Modal body text goes here.</p>
                    </div>
                    <div class="col-4">
                        <img class="img" src="images/tiposVino/{{$key}}.png" alt="Card image cap" draggable="false">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $('.card.analytics').on('click',function(){
            $wineModal = $('#wineModal');
            $wineModal.find('.name').text($(this).find('.name').text());
            $wineModal.find('.description').text($(this).find('.description').text());
            $wineModal.find('.img').prop("src", $(this).find('.img').prop("src"));
            $('#wineModal').modal('show');
        });
    </script>
@endpush
