@extends('main')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 py-3 text-center">
            <div class="card">
                <div class="card-body">

                    <h2 class="card-title py-4">Registro</h2>

                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Registro') }}">
                        @csrf

                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>


                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row justify-content-md-center">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ __('Crear cuenta') }}</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
