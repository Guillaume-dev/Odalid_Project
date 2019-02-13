@extends('layouts.navigation')

@section('titre', 'Lecteurs')

@section('content')

<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <h1 class="al-title ng-binding">Lecteurs</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lecteurs</li>
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
                            <h1>Gestion des lecteurs</h1>
                            <p>Gestion des lecteurs ainsi que leurs permissions</p>
                        </div>
                        @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                        <div class="col-md-3 col-md-pull-9 text-center"><a href="{{ route('LecteursNew') }}"><button class="btn btn-info btn-raised addNew"><img class="btn-img-medium" alt="Image badge" src="/img/reader-add.png" width="64" height="64">
                                <p>Nouveau lecteur</p>
                                <p></p>
                            </button></a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div ba-panel="" ba-panel-title="Liste des lecteurs" ba-panel-class="light-text" class="ng-scope">
            <div class="panel light-text" zoom-in="">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Liste des lecteurs</h3>
                </div>
                <div class="panel-body" ng-transclude="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Porte</th>
                                <th scope="col">Adresse IP</th>
                                <th scope="col">Adresse MAC</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lecteurs as $lecteur)
                            <tr>
                                <td>{{ $lecteur->nom }}</td>
                                <td>{{ $lecteur->porte_id }}</td>
                                <td>{{ $lecteur->ip }}</td>
                                <td>{{ $lecteur->mac }}</td>
                                <td><a href="{{ route('LecteursEdit', ['n' => $lecteur->id]) }}"><button type="button" class="btn btn-primary btn-sm">Editer</button></a><button type="button" class="btn btn-danger btn-sm">Supprimer</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end ngRepeat: user in dataForm -->
                    <!--  <div ng-hide="dataForm.length!=0" class="ng-scope ng-hide">
                        <p class="text-center text-muted">Aucun utilisateur n'a été cree. Pour cree un utilisateur cliquer sur Nouvel utilisateur</p>
                    </div>-->
                </div>
            </div>
        </div>


        <!--<div class="espace" style="height:13vh;"></div>
	<div class="card mx-auto" style="width: 87vw; height:81vh">
  <div class="card-header">
    <h1 class="text-center">Lecteurs</h1>
      <a href="{{ route('LecteursNew') }}"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-rss-square" aria-hidden="true"></i> Ajouter un lecteur </a>
  </div>
  <div class="card-body" style=" overflow: auto; height:70vh;">

      <table class="table table-striped" >
        <thead>
          <tr>
            <th scope="col">Editer</th>
            <th scope="col">Nom</th>

          </tr>
        </thead>
        <tbody>

          @foreach ($lecteurs as $lecteur)
              <tr>
                  <th scope='row'><a href="{{ route('LecteursEdit', ['n' => $lecteur->id]) }}"><i class="fa fa-edit deep-orange-text" aria-hidden="true"></i></a></th>
                <td>{{ $lecteur->nom }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

</div>-->

        @endsection
