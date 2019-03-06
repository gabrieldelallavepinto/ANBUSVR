@extends('main')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12 py-2">
            <div class="card">
                <div class="card-body">

                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h1>Proyectos</h1>
                            @if(!count($projects))
                                <h4>Ningún proyecto creado</h4>
                            @else
                                <h4>Total de proyectos: {{count($projects)}}</h4>
                            @endif
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('project.create') }}" class="d-flex justify-content-end"><i class="material-icons" data-toggle="tooltip" data-placement="top" title="Crear proyecto" style="font-size: 40px;">add_circle</i></a>
                        </div>
                    </div>

                    @if(count($projects))

                        <div class="table-height table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">API ID</th>
                                        <th scope="col">Numero de Encuestados</th>
                                        <th scope="col">Numero de Objetos</th>
                                        <th scope="col">Numero de Escenas</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->participants()->count()}}</td>
                                        <td>{{$project->items()->count()}}</td>
                                        <td>{{$project->scenes()->count()}}</td>
                                        <td>

                                            <div class="d-flex float-right">
                                                <a href="{{route('project.show', ['project' => $project->id])}}"><i class="material-icons" data-toggle="tooltip" data-placement="top" title="Ver Proyecto">remove_red_eye</i></a>
                                                <form action="{{route('project.destroy', [ $project->id ])}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="#" onclick="deleteProject(this)" ><i class="material-icons" data-toggle="tooltip" data-placement="top" title="Borrar el proyecto">delete</i></a>
                                                </form>

                                            </div>

                                        </td>

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
</div>

@endsection

@push('scripts')
    <script>
        function deleteProject($this){
            if (confirm('¿Desea borrar el proyecto?')) {
                $($this).parent().submit();
            }
        };
    </script>
@endpush
