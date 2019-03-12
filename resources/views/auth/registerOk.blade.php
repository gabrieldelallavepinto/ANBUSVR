@extends('main')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 py-2 text-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title py-4">Se ha registrado correctamente</h5>
                    <a class="btn btn-primary" href="{{route('project')}}">Ir a mis proyectos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
