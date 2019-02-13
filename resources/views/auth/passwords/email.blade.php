@extends('layouts.navigation')

@section('content')
<!-- ------------------ FORGOT PASSWORD PAGE ------------------ -->

<div class="view full-page-intro" style="background-image: url('../../img/fond5.jpg'); background-repeat: no-repeat; background-size: cover; height: 100vh;">
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row wow fadeIn">
          <div class="col-md-6 col-xl-5 mb-4 mx-auto">
            <div class="card">
              <div class="card-body">
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
                <form method="POST" action="{{ route('reset.pass') }}">
                  @csrf
                    <p class="h4 text-center mb-4">Saisissez votre Email</p>
                    <div class="md-form">
                      <i class="fa fa-envelope prefix grey-text"></i>
                      <input type="email" name="email" id="materialFormRegisterEmailEx" class="form-control" required autofocus>
                      <label for="materialFormRegisterEmailEx">Email</label><br>
                    </div>
                    <div class="text-center mt-4">
                      <p class="blue-text text-center">Validez pour réinitialisez votre mot de passe </p>
                      <button class="btn btn-primary" type="submit">Validez</button>
                    </div>
                </form>
                <br><br>
              </div>
              <p class="text-center"> <strong><i class="fa fa-volume-control-phone" aria-hidden="true"></i> : +33 0 12 34 56 78</strong> <br />
              En cas d'utilisation hors ligne de nos services, merci contacter notre équipe de maintenance.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
