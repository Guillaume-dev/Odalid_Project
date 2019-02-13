@extends('layouts.navigation')

@section('titre', 'Zones')

@section('content')

<div class="espace" style="height:13vh;"></div>
<div class="al-content">
    <top-content-navigation>
        <div class="content-top clearfix">
            <h1 class="al-title ng-binding">Zones</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Zones</li>
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
                            <h1>Gestion des zones</h1>
                            <p>Gestion des zones ainsi que leurs permissions</p>
                        </div>
                         @if (Auth::user()->roles == 'superadmin' || Auth::user()->roles == 'admin')
                        <div class="col-md-3 col-md-pull-9 text-center"><a href="{{ route('ZonesNew') }}"><button class="btn btn-info btn-raised addNew"><img class="btn-img-medium" alt="Image badge" src="/img/area-add.png" width="64" height="64">
                                <p>Nouvelle zone</p>
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
                    <h3 class="panel-title">Liste des zones</h3>
                </div>
                <div class="panel-body" ng-transclude="">
                   @foreach ($zones as $zone)
                    <a href="{{ route('ZonesMenu', ['n' => $zone->id]) }}">
                    <button class="admin">
                    <div class="card" style="width: 10rem;">
                        <img class="card-img-top" src="/img/area.png" alt="Card image cap" >
                        <div class="card-body">
                            <p class="card-text">{{ $zone->nom }}</p>
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

	<!--<div class="espace" style="height:13vh;"></div>
	<div class="card mx-auto" style="width: 87vw; height:81vh">
  <div class="card-header">
    <h1 class="text-center">Zones</h1>
      <a href="{{ route('ZonesNew') }}"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-street-view" aria-hidden="true"></i> Ajouter une zone </a>
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

          @foreach ($zones as $zone)
              <tr>
                  <th scope='row'><a href="{{ route('ZonesEdit', ['n' => $zone->id]) }}"><i class="fa fa-edit deep-orange-text" aria-hidden="true"></i></a></th>
                <td>{{ $zone->nom }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
  </div>

</div>-->

@endsection
