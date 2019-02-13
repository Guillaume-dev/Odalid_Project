@extends('layouts.navigation')

@section('titre', 'Salles')

@section('content')
<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <h1 class="al-title ng-binding">Salles</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Salles</li>
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
                            <h1>Gestion des salles</h1>
                            <p>Gestion des salles ainsi que leurs permissions</p>
                        </div>
                         @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                        <div class="col-md-3 col-md-pull-9 text-center"><a href="{{ route('SallesNew') }}"><button class="btn btn-info btn-raised addNew"><img class="btn-img-medium" alt="Image badge" src="/img/room-add.png" width="64" height="64">
                                <p>Nouvelle salle</p>
                                <p></p>
                            </button></a></div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
        <div ba-panel="" ba-panel-title="Liste des zones" ba-panel-class="light-text" class="ng-scope">
            <div class="panel light-text" zoom-in="">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">Liste des salles</h3>
                </div>
                <div class="panel-body" ng-transclude="">
                   @foreach ($salles as $salle)
                    <a href="{{ route('SallesMenu', ['n' => $salle->id]) }}">
                    <button class="admin">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="/img/room.png" alt="Card image cap" >
                        <div class="card-body">
                            <p class="card-text">{{ $salle->nom }}</p>
                        </div>
                    </div>
                    </button>
                     @endforeach
                
                    <!-- end ngRepeat: user in dataForm -->
                    <!--  <div ng-hide="dataForm.length!=0" class="ng-scope ng-hide">
                        <p class="text-center text-muted">Aucun utilisateur n'a été cree. Pour cree un utilisateur cliquer sur Nouvel utilisateur</p>
                    </div>-->
                    </a>
                </div>
            </div>
        </div>


 <!-- <div class="espace" style="height:13vh;"></div>
  <div class="card mx-auto" style="width: 87vw; height:81vh">
  <div class="card-header">
    <h1 class="text-center">Salles</h1>
      <a href="{{ route('SallesNew') }}"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-cube" aria-hidden="true"></i> Ajouter une salle</a>
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

          @foreach ($salles as $salle)
              <tr>
                  <th scope='row'><a href="{{ route('SallesEdit', ['n' => $salle->id]) }}"><i class="fa fa-edit deep-orange-text" aria-hidden="true"></i></a></th>
                <td>{{ $salle->nom }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

</div>
-->
@endsection
