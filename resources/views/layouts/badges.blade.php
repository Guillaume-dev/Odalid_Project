@extends('layouts.navigation')

@section('titre', 'Badges')


@section('content')
<!-- ------------------ BADGES EDIT PAGE ------------------ -->

<div class="espace" style="height:13vh;"></div>
<div class="card mx-auto" style="width: 80vw; height:80vh;">
    <div class="card-header">
        <h1 class="text-center">Badges - @yield('titre')</h1>
    </div>
    <div class="card-body" style=" overflow: auto;">
        <!--<form name="modif" action="" method="POST">
            <input type='hidden' name="id" value="@yield('id')">
            @csrf
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
                <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>
                <div class="col-md-6">
                    <input id="prenom" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="prenom" value="@yield('prenom')" required>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('prenom') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" value="@yield('email')">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="dateDeNaissance" class="col-md-4 col-form-label text-md-right">Date de naissance</label>
                <div class="col-md-6">
                    <input id="dateDeNaissance" type="date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dateDeNaissance" value="@yield('dateDeNaissance')">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="numeroIdentite" class="col-md-4 col-form-label text-md-right">Numero d'identité</label>
                <div class="col-md-6">
                    <input id="numeroIdentite" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="numeroIdentite" value="@yield('numeroIdentite')">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="sexe" class="col-md-4 col-form-label text-md-right">Sexe</label>
                <div class="col-md-6">
                    <input id="sexe" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="sexe" value="@yield('sexe')">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">Type (référent)</label>
                <div class="col-md-6">
                    <input id="type" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="type" value="@yield('type')">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="groupe" class="col-md-4 col-form-label text-md-right">Groupe</label>
                <div class="col-md-6">
                    <select name="groupe" id="groupe">
                        <option value="" @isset($badge->groupe) @else {{ 'selected' }} @endisset>Aucun</option>
                        @foreach($referents as $referent)
                        <option value="{{ $referent->id }}" @isset($badge->groupe) @if($badge->groupe == $referent->id) {{ 'selected' }} @endif @endisset>{{ $referent->type }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="dateDeValidite" class="col-md-4 col-form-label text-md-right">Date de Validité</label>
                <div class="col-md-6">
                    <input id="dateDeValidite" type="date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dateDeValidite" value="@yield('dateDeValidite')">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            {{ csrf_field() }}
        </form>
-->
        @yield('restri')
        <div class="form-group row">
            <div class="col-md-4 col-form-label  mx-auto">
                <button type="submit" class="btn btn-primary btn-md">Valider</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-4 d-flex justify-content-end ">
                <a href="{{ route('Badges') }}"><button class="btn btn-blue-grey">Retour</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
