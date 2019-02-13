@extends('layouts.navigation')

@section('content')
<!-- ------------------ NEW USER PAGE ------------------ -->

<div class="espace" style="height:13vh;"></div>
    <!--<div class="container">-->
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height: 80vh;">-->
    <div class="card mx-auto" style="width: 80vw; height:80vh;">
        <div class="h1 card-header text-center">Ajouter un utilisateur</div>
        <div class="card-body" style="height: 80vh; overflow: auto;">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse email') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation du mot de passe') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Rôle') }}</label>
                    <div class="col-md-6">
                        @include('UtilisateursRole')
                    </div>
                </div>

                <div class="form-group row">
                    <label for="expire_at" class="col-md-4 col-form-label text-md-right">{{ __('Date d\'expiration') }}</label>
                    <div class="col-md-6">
                        <input id="expire_at" type="date" class="form-control{{ $errors->has('expire_at') ? ' is-invalid' : '' }}" name="expire_at" value="{{ old('expire_at') }}" required>
                        @if ($errors->has('expire_at'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('expire_at') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Valider') }}
                        </button>
                    </div>
                </div>
            </form>

            @yield('supprimer')

            <div class="row">
                <div class="col-md-6 offset-md-4 d-flex justify-content-end">
                    <a href="{{ route('Utilisateurs') }}"><button class="btn btn-blue-grey">Retour</button></a>
                </div>
            </div>
        </div>
    </div>


@endsection
