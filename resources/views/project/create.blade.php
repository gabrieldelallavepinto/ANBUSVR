@extends('main')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 py-3 text-center">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title py-4">Crear Proyecto</h2>

                    <form method="POST" action="{{route('project.store')}}">

                        @csrf

                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombre del proyecto" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ __('Crear proyecto') }}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
