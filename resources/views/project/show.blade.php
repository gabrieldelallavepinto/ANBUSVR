@extends('main')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 py-2">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h1>Proyecto {{ $project->name }}</h1>
                            @if(!$project->items->count())
                                <h4>Ningún objetos encontrado</h4>
                            @else
                                <h4>Total de objetos: {{$project->items->count()}}</h4>
                            @endif
                        </div>
                    </div>

                    @if($project->items->count())

                        {{-- tabla --}}
                        <div class="table-height table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Nº de observaciones</th>
                                        <th scope="col">Tiempo medio observaciones</th>
                                        <th scope="col">Tiempo maximo observaciones</th>
                                        <th scope="col">Nº de agarres</th>
                                        <th scope="col">Tiempo medio agarres</th>
                                        <th scope="col">Tiempo maximo agarres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($project->items as $item)
                                        @php
                                            $tiempoMedioObservacion = 0;
                                            $tiempoMaximoObservacion = 0;
                                            if($item->gazes->count()){
                                                foreach($item->gazes as $gaze){
                                                    $duracion = $gaze->timeEnd - $gaze->timeStart;
                                                    $tiempoMedioObservacion += $duracion;
                                                    $tiempoMaximoObservacion = max($tiempoMaximoObservacion, $duracion);
                                                }
                                                $tiempoMedioObservacion /= $item->gazes->count();
                                            }

                                            $tiempoMedioAgarre = 0;
                                            $tiempoMaximoAgarre = 0;
                                            if($item->grabbs->count()){
                                                foreach($item->grabbs as $grab){
                                                    $duracion = $grab->timeEnd - $grab->timeStart;
                                                    $tiempoMedioAgarre += $duracion;
                                                    $tiempoMaximoAgarre = max($tiempoMaximoAgarre, $duracion);
                                                }
                                                $tiempoMedioAgarre /= $item->grabbs->count();
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->gazes->count()}}</td>
                                            <td>{{$tiempoMedioObservacion}}</td>
                                            <td>{{$tiempoMaximoObservacion}}</td>
                                            <td>{{$item->grabbs->count()}}</td>
                                            <td>{{$tiempoMedioAgarre}}</td>
                                            <td>{{$tiempoMaximoAgarre}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- graficos --}}
    @if($project->items->count())

        <div class="row">
            {{-- numero de observaciones --}}
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Numero de observaciones</h5>
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
            </div>

            {{-- numero de agarres --}}
            <div class="col-md-4 py-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Numero de agarres</h5>
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>

    @endif

</div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    <script>
        // variables
        var items =  @json($project->items);
    </script>

    <script>

        //funcion que devuelve un color aleatorio rgb
        function colorRand(){
            var rgb = ['r', 'g', 'b'];
            var rgbColor = {};

            rgb.forEach(rgb => {
                rgbColor[rgb] = Math.floor((Math.random() * 256));
            });

            return rgbColor;
        }

        //estructura de datos
        var labels = [];
        var backgroundColor = [];
        var options = [];

        items.forEach(item => {
            labels.push(item['name']);
            backgroundColor.push('rgba('+Object.values(colorRand())+',0.7)');
        });

        // chart1
        var data1 = [];
        items.forEach(item => {
            data1.push(item['gazes'].length);
        });

        var ctx = document.getElementById('chart1').getContext('2d');
        var chart1 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data1,
                    backgroundColor: backgroundColor,
                }],
            },
            options: options
        });


        // chart2
        var data2 = [];
        items.forEach(item => {
            data2.push(item['grabbs'].length);
        });

        var ctx = document.getElementById('chart2').getContext('2d');
        var chart2 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data2,
                    backgroundColor: backgroundColor,
                }],
            },
            options: options
        });

    </script>
@endpush
