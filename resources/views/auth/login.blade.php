@extends('layouts.log')

@section('content')
<!-- ------------------ LOGIN PAGE ------------------ -->   
<div class="flex-center position-ref">  
  <div class="card-login col-5 login-card">
    <div class="card-title">
      <h3 class="text-center">Admin UGCA</h3>
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="md-form">
          <i class="fa fa-envelope prefix white-text"></i>
          <input type="email" id="materialFormRegisterEmailEx" class="form-control form-control-log" name="email" value="{{ old('email') }}" required autofocus>
          <label for="materialFormRegisterEmailEx">Email</label><br>
        </div>
        <div class="md-form">
          <i class="fa fa-lock prefix white-text"></i>
          <input type="password" id="materialFormRegisterPasswordEx" class="form-control form-control-log" name="password" required>
          <label for="materialFormRegisterPasswordEx">Mot de Passe</label><br>
        </div>
          <!-- DEBUT DU FORM DE LOGIN CLASSIQUE -->
          <!-- <div>
            <i class="fa fa-envelope prefix white-text"></i>
            <label for="materialFormRegisterEmailEx">Email</label>  
            <input type="password" id="materialFormRegisterEmailEx" class="form-control">
          </div>
          <div>
            <i class="fa fa-lock prefix white-text"></i>
            <label for="materialFormRegisterPasswordEx">Mot de Passe</label>  
            <input type="password" id="materialFormRegisterPasswordEx" class="form-control">
          </div> -->
          <!-- FIN DU FORM DE LOGIN CLASSIQUE -->
        <div class="text-right mt-4">
          <div class="form-keepCo">
            <label for="keepCo">Rester Connecté</label><br>
            <input type="checkbox" checked data-toggle="toggle" data-on="Oui" data-off="Non" data-onstyle="default" data-offstyle="danger">
          </div>
          <button class="btn btn-default log-btn" type="submit">Connexion</button> <br><br>
          <a href="{{ route('forgot.pass') }}"><p class="font-weight-bold text-right mdp-oublie">Mot de passe oublié?</p></a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
