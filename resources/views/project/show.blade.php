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
                                <h4>Ningún objeto encontrado</h4>
                            @else
                                <h4>Total de objetos: {{$project->items->count()}}</h4>
                            @endif
                        </div>
                        <div class="col-auto">
                            {{-- exportaciones --}}
                            <a href="{{ route('gaze.export',['project_id' => $project->id]) }}" class="justify-content-end"><i class="material-icons" data-toggle="tooltip" data-placement="top" title="Exportar Observaciones" style="font-size: 40px;">remove_red_eye</i></a>
                            <a href="{{ route('grab.export',['project_id' => $project->id]) }}" class="justify-content-end"><i class="material-icons" data-toggle="tooltip" data-placement="top" title="Exportar agarres" style="font-size: 40px;">touch_app</i></a>
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
                                        <th scope="col">duración maxima observaciones</th>
                                        <th scope="col">duración mínima observaciones</th>
                                        <th scope="col">duración media observaciones</th>
                                        <th scope="col">Nº de agarres</th>
                                        <th scope="col">duración maxima agarres</th>
                                        <th scope="col">duración mínima agarres</th>
                                        <th scope="col">duración media agarres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($project->items as $item)
                                        @php
                                            $duracionGazes = [];
                                            foreach($item->gazes as $gaze){
                                                $duracionGazes[] = $gaze->timeEnd - $gaze->timeStart;
                                            }

                                            $duracionGrabbs = [];
                                            foreach($item->grabbs as $grab){
                                                $duracionGrabbs[] = $grab->timeEnd - $grab->timeStart;
                                            }

                                        @endphp
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->gazes->count() }}</td>
                                            <td>{{ $item->gazes->count() > 0 ? max($duracionGazes):0 }}</td>
                                            <td>{{ $item->gazes->count() > 0 ? min($duracionGazes):0 }}</td>
                                            <td>{{ $item->gazes->count() > 0 ? array_sum($duracionGazes)/$item->gazes->count():0}}</td>
                                            <td>{{ $item->grabbs->count() }}</td>
                                            <td>{{ $item->grabbs->count() > 0 ? max($duracionGrabbs):0 }}</td>
                                            <td>{{ $item->grabbs->count() > 0 ? min($duracionGrabbs):0 }}</td>
                                            <td>{{ $item->grabbs->count() > 0 ? array_sum($duracionGrabbs)/$item->grabbs->count():0}}</td>
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
            <div class="col-md-6 py-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Numero de observaciones</h5>
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
            </div>

            {{-- numero de agarres --}}
            <div class="col-md-6 py-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Numero de agarres</h5>
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>

             {{-- Duración Observaciones --}}
             <div class="col-md-6 py-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Duración de observaciones</h5>
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>

            {{-- Duración de agarres --}}
            <div class="col-md-6 py-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Duración de agarres</h5>
                        <canvas id="chart4"></canvas>
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
            options: {},
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
            options: {},
        });

        // chart3
        var durationsMax = [];
        var durationsMin = [];
        var durationsMed = [];

        //tiempo medio
        items.forEach(item => {
            var durations = [];


            item['gazes'].forEach(gaze => {
                var duration = gaze['timeEnd'] - gaze['timeStart'];
                durations.push(duration);
            });

            durationsMax.push(Math.max.apply(null,durations));
            durationsMin.push(Math.min.apply(null,durations));

            if(item['gazes'].length > 0){
                durationMed = 0;
                durations.forEach(duration => {
                    durationMed += duration;
                });
                durationsMed.push(durationMed/item['gazes'].length);
            }else{
                durationsMed.push(0);
            }

        });


        var ctx = document.getElementById('chart3').getContext('2d');
        var chart3 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Duración máxima',
                        backgroundColor: 'rgba(191,63,63,0.5)',
                        data: durationsMax,
                        type: 'line',
                        fill: false,
                        showLine: false,
                        pointRadius: 8,
                        pointHoverRadius: 8,

                    },
                    {
                        label: 'Duración mínima',
                        backgroundColor: 'rgba(63,191,191,0.5)',
                        data: durationsMin,
                        type: 'line',
                        fill: false,
                        showLine: false,
                        pointRadius: 8,
                        pointHoverRadius: 8,

                    },
                    {
                        label: 'Duración media',
                        backgroundColor: 'rgba(127,63,191,0.5)',
                        data: durationsMed,

                    }
                ],
            },
            options: {
					tooltips: {
						mode: 'index',
						intersect: false
					}
				}
        });

        // chart4
        var durationsMax = [];
        var durationsMin = [];
        var durationsMed = [];

        //tiempo medio
        items.forEach(item => {
            var durations = [];


            item['grabbs'].forEach(gaze => {
                var duration = gaze['timeEnd'] - gaze['timeStart'];
                durations.push(duration);
            });

            durationsMax.push(Math.max.apply(null,durations));
            durationsMin.push(Math.min.apply(null,durations));

            if(item['grabbs'].length > 0){
                durationMed = 0;
                durations.forEach(duration => {
                    durationMed += duration;
                });
                durationsMed.push(durationMed/item['grabbs'].length);
            }else{
                durationsMed.push(0);
            }

        });


        var ctx = document.getElementById('chart4').getContext('2d');
        var chart4 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Duración máxima',
                        backgroundColor: 'rgba(191,63,63,0.5)',
                        data: durationsMax,
                        type: 'line',
                        fill: false,
                        showLine: false,
                        pointRadius: 8,
                        pointHoverRadius: 8,

                    },
                    {
                        label: 'Duración mínima',
                        backgroundColor: 'rgba(63,191,191,0.5)',
                        data: durationsMin,
                        type: 'line',
                        fill: false,
                        showLine: false,
                        pointRadius: 8,
                        pointHoverRadius: 8,

                    },
                    {
                        label: 'Duración media',
                        backgroundColor: 'rgba(127,63,191,0.5)',
                        data: durationsMed,

                    }
                ],
            },
            options: {
					tooltips: {
						mode: 'index',
						intersect: false
					}
				}
        });

    </script>
@endpush
