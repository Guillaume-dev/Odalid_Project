@extends('layouts.navigation')

@section('titre', 'Utilisateurs')

@section('content')
    <div class="espace" style="height:13vh;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="h4 card-header text-center">Modifier un utilisateur</div>

                    <div class="card-body" style="overflow: auto; ">
                        <form method="POST" name="modif" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Nom </label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Adresse email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="roles" class="col-md-4 col-form-label text-md-right"> </label>

                                <div class="col-md-6" style="left: -4vw;">
                                  <label for="roles">Role  </label>
                                  @include('UtilisateursRole')

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="expire_at" class="col-md-4 col-form-label text-md-right">Expire le </label>

                                <div class="col-md-6">
                                    <input id="expire_at" type="date" class="form-control{{ $errors->has('expire_at') ? ' is-invalid' : '' }}" name="expire_at" value="{{ $user->expire_at }}" required>

                                    @if ($errors->has('expire_at'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('expire_at') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="enabled" class="col-md-4 col-form-label text-md-right">Actif  </label>

                                <div class="col-md-6">
                                  <input type="checkbox" id="enabled" name="enabledOn" @if($user->enabled){{ 'checked' }}@endif>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="mx-auto col-12 col-sm-6 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Valider') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @yield('supprimer')
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center">
                                <a href="{{ route('UtilisateursDelete', ['n' => $user->id]) }}"><button class="btn btn-danger">Supprimer</button></a>
                            </div>
                            <div class="col-12 col-sm-6 text-center">
                                <a href="{{ route('Utilisateurs') }}"><button class="btn btn-blue-grey">Retour</button></a>
                            </div>
                      </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
