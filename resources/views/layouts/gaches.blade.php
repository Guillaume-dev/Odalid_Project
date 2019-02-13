@extends('layouts.navigation')

@section('titre', 'Gâches')

@section('content')
<!-- ------------------ GACHES EDIT PAGE ------------------ -->

<div class="espace" style="height:13vh;"></div>
<div class="card mx-auto w-75" style="width: 80vw; height:60vh;">
    <div class="card-header">
        <h1 class="text-center">Gâche - @yield('titre')</h1>
    </div>
    <div class="card-body" style="height: 80vh; overflow: auto;">
        <div class="card-body" style=" overflow: auto;">
            <form name="modif" action="" method="POST">

                <div class="form-group row">
                    <label for="ip" class="col-md-4 col-form-label text-md-right">IP</label>
                    <div class="col-md-6">
                        <input id="ip" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ip" value="@yield('ip')" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mac" class="col-md-4 col-form-label text-md-right">Mac</label>
                    <div class="col-md-6">
                        <input id="mac" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="mac" value="@yield('mac')" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nom" value="@yield('nom')" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                @yield('type')



                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-12 col-md-4 col-form-label mx-auto">
                        <button type="submit" class="btn btn-primary btn-md">Valider</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-12 col-sm-6 text-center">
                    @yield('supprimer')
                </div>
                <div class="col-md-6 offset-md-4 d-flex justify-content-end ">
                    <a href="{{ route('Gaches') }}"><button class="btn btn-blue-grey">Retour</button></a>
                </div>
            </div>
        </div>
        @endsection
