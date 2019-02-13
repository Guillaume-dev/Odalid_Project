@extends('layouts.navigation')

@section('titre', 'Utilisateurs')

@section('content')
<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <h1 class="al-title ng-binding">Utilisateurs</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                </ol>
            </nav>
        </div>
    </top-content-navigation><!-- uiView: -->
    <div ui-view="" autoscroll="true" autoscroll-body-top="" class="ng-scope" style="">
        <div ba-panel="" ba-panel-class="light-text">
            <div class="panel light-text" zoom-in="">
                <div class="panel-body">
                    <div class="row clearfix ">
                        <div class="col-md-9 col-md-push-3">
                            <h1>Gestion des utilisateurs</h1>
                            <p>Gestion des utilisateurs ainsi que leurs permissions</p>
                        </div>
                         @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                        <div class="col-md-3 col-md-pull-9 text-center"><a href="{{ route('register') }}"><button class="btn btn-info btn-raised addNew"><img class="btn-img-medium" alt="Image utilisateur" src="/img/userAdd.png" width="64" height="64">
                                <p>Nouveau utilisateur</p>
                            
                            </button></a></div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
        <div ba-panel="" ba-panel-title="Liste des utilisateurs" ba-panel-class="light-text" class="ng-scope">
            <div class="panel light-text" zoom-in="">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Liste des utilisateurs</h3>
                </div>
                <div class="panel-body" ng-transclude="">
                   @foreach ($users as $user)
                    <a href="{{ route('UtilisateursMenu', ['n' => $user->id ]) }}">
                    <button class="admin">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="/img/user2.png" alt="Card image cap" >
                        <div class="card-body">
                            <p class="card-text">{{ $user->username }}</p>
                        </div>
                    </div>
                    </button>
                     @endforeach
                   <!--  end ngRepeat: user in dataForm 
                   <button class="admin">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="/img/user2.png" alt="Card image cap" width="128px" height="128px" >
                        <div class="card-body">
                            <p class="card-text">Super-admin</p>
                        </div>
                    </div>
                    </button>-->
                    <!-- end ngRepeat: user in dataForm -->
                    <!--  <div ng-hide="dataForm.length!=0" class="ng-scope ng-hide">
                        <p class="text-center text-muted">Aucun utilisateur n'a été cree. Pour cree un utilisateur cliquer sur Nouvel utilisateur</p>
                    </div>-->
                    </a>
                </div>
            </div>
        </div>
   

<!--<div class="espace" style="height:15vh;"></div>
<div class="card mx-auto" style="width: 87vw; height:81vh">
  <div class="card-header">
    <h1 class="text-center">Accueil utilisateurs</h1>
    @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
      <a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Ajouter un utilisateur</a>
    @endif
  </div>
  <div class="card-body" style="overflow: auto;">
    <table class="table table-striped">
        <thead>
        <tr>

          	@if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
          		<th scope="col">Editer</th>
          	@endif
          <th scope="col">Compte</th>
          <th scope="col">Email</th>
          <th scope="col">Actif</th>
          <th scope="col">Role</th>
          <th scope="col">Date d'expiration</th>
          <th scope="col">Dernière connexion</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
          <tr>
          	@if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
            	<th scope='row'><a href="{{ route('UtilisateursEdit', ['n' => $user->id ]) }}"><i class="fa fa-edit deep-orange-text" aria-hidden="true"></i></a></th>
    		@endif
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->enabled }}</td>
            <td>{{ $user->roles }}</td>
            <td>{{ $user->expire_at }}</td>
            <td>{{ $user->last_login }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>-->
@endsection
