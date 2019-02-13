@extends('layouts.navigation')

@section('titre', 'Portes')

@section('content')
<!-- ------------------ PORTES EDIT PAGE ------------------ -->

<div class="espace" style="height:13vh;"></div>
<div class="card mx-auto" style="width: 80vw; height:60vh;">
    <div class="card-header">
        <h1 class="text-center">Portes - @yield('titre')</h1>
    </div>
    <div class="card-body" style=" overflow: auto;">
        <form name="modif" action="" method="POST">
            <p>@yield('id')<input type='hidden' name="id" value="@yield('id')"></p>

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

            <div class="form-group row">
                <label for="salle_id" class="col-md-4 col-form-label text-md-right">Salle </label>
                <div class="col-md-6">
                    <select id="salle_id" name="salle_id">
                        @yield('option_salle')
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="relais_id" class="col-md-4 col-form-label text-md-right">Relais </label>
                <div class="col-md-6">
                    <select id="relais_id" name="relais_id">
                        @yield('option_relais')
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="lecteur_id" class="col-md-4 col-form-label text-md-right">Lecteur </label>
                <div class="col-md-6">
                    @yield('option_lecteur')
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-group row">
                <div class="col-md-4 col-form-label mx-auto">
                    <button type="submit" class="btn btn-primary btn-md">Valider</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12 col-sm-6 text-center">
                @yield('supprimer')
            </div>
            <div class="col-md-6 offset-md-4 d-flex justify-content-end">
                <a href="{{ route('Portes') }}"><button class="btn btn-blue-grey">Retour</button></a>
            </div>
        </div>
    </div>
    @endsection
