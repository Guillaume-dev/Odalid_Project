@extends('layouts.navigation')

@section('titre', 'Badges')

@section('content')
<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <h1 class="al-title ng-binding">Badges</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Badges</li>
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
                            <h1>Gestion des badges</h1>
                            <p>Gestion des badges ainsi que leurs permissions</p>
                        </div>
                         @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                        <div class="col-md-3 col-md-pull-9 text-center"><a href="{{ route('BadgesNew')  }}"><button class="btn btn-info btn-raised addNew"><img class="btn-img-medium" alt="Image badge" src="/img/userAdd.png" width="64" height="64">
                                <p>Nouveau badge</p>
                                
                            </button></a></div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
        <div ba-panel="" ba-panel-title="Liste des badges" ba-panel-class="light-text" class="ng-scope">
            <div class="panel light-text" zoom-in="">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Liste des badges</h3>
                </div>
                <div class="panel-body" ng-transclude="">
                   @foreach ($badges as $badge)
                    <a href="{{ route('BadgesMenu', ['n' => $badge->id]) }}">
                    <button class="admin">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="/img/user2.png" alt="Card image cap" >
                        <div class="card-body">
                            <p class="card-text">{{ $badge->nom }} {{ $badge->prenom }}</p>
                        </div>
                    </div>
                    </button>
                     @endforeach
                    <!--  <div ng-hide="dataForm.length!=0" class="ng-scope ng-hide">
                        <p class="text-center text-muted">Aucun utilisateur n'a été cree. Pour cree un utilisateur cliquer sur Nouvel utilisateur</p>
                    </div>-->
                    </a>
                </div>
            </div>
        </div>

<!--<div class="espace" style="height:13vh;"></div>
<div class="card mx-auto" style="width: 87vw; height:81vh">
  <div class="card-header">
    <h1 class="text-center">Badges</h1>
      <a href="{{ route('BadgesNew') }}"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-id-badge" aria-hidden="true"></i> Ajouter un badge</a>
  </div>
  <div class="card-body" style=" overflow: auto; height:70vh;">

      <table class="table table-striped" >
        <thead>
          <tr>
            <th scope="col">Editer</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Sexe</th>
            <th scope="col">Numéro ID</th>
            <th scope="col">Date de Validité</th>
            <th scope="col">Type</th>
            <th scope="col">Email</th>
            <th scope="col">Date de Naissance</th>
            <th scope="col">Numéro d'identité</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($badges as $badge)
              <tr>
                  <th scope='row'><a href="{{ route('BadgesEdit', ['n' => $badge->id]) }}"><i class="fa fa-edit deep-orange-text" aria-hidden="true"></i></a></th>
                <td>{{ $badge->nom }}</td>
                <td>{{ $badge->prenom }}</td>
                <td>{{ $badge->sexe }}</td>
                <td>{{ $badge->numeroID }}</td>
                <td>{{ $badge->dateDeValidite }}</td>
                <td>{{ $badge->type }}</td>
                <td>{{ $badge->email }}</td>
                <td>{{ $badge->dateDeNaissance }}</td>
                <td>{{ $badge->numeroIdentite }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  <div class="mx-auto mt-2">{{ $badges->links() }}</div>
</div>-->
@endsection
